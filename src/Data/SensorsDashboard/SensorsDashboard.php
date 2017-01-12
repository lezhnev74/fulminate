<?php
namespace Fulminate\Data\SensorsDashboard;

use Carbon\Carbon;
use Fulminate\Data\Sensor\Config;
use Fulminate\Data\Sensor\Sensor;
use Fulminate\Data\Sensor\Id;
use Fulminate\Data\Sensor\Rule\Bag;
use Fulminate\Data\Sensor\Status;
use Fulminate\Data\Sensor\Type;

class SensorsDashboard
{
    protected $sensors = [];
    
    /**
     * Factory method
     *
     * @param Config $config
     *
     * @return SensorsDashboard
     */
    static public function fromConfig(Config $config): self
    {
        $sensors = [];
        foreach($config->getConfig() as $sensor_config) {
            $sensors[] = new Sensor(
                new Id($sensor_config['id']),
                $sensor_config['name'],
                new Type(
                    $sensor_config['type']['type'],
                    $sensor_config['type']['status_update_frequency'] ?? null,
                    $sensor_config['type']['url'] ?? null,
                    $sensor_config['type']['host'] ?? null,
                    $sensor_config['type']['https'] ?? null,
                    $sensor_config['type']['ip_list'] ?? []
                ),
                new Bag(),
                new Status(null, [], Carbon::now())
            );
        }
        
        return new static($sensors);
    }
    
    /**
     * SensorsDashboard constructor.
     *
     * @param array $sensors
     */
    public function __construct(array $sensors)
    {
        $this->sensors = $sensors;
    }
    
    public function getActiveSensors(): array
    {
        return array_filter($this->sensors, function($sensor) {
            return $sensor->isActiveType();
        });
    }
    
    public function getPassiveSensors(): array
    {
        return array_filter($this->sensors, function($sensor) {
            return !$sensor->isActiveType();
        });
    }
    
    /**
     * @return array
     */
    public function getSensors(): array
    {
        return $this->sensors;
    }
    
    /**
     * @param Id     $sensor_id
     * @param Status $new_status
     *
     * @throws \Exception
     */
    public function updateSensorStatus(Id $sensor_id, Status $new_status)
    {
        foreach($this->sensors as $key => $sensor) {
            if($sensor->getId()->isEqual($sensor_id)) {
                $this->sensors[ $key ] = $sensor->changeStatus($new_status);
            }
        }
        
        throw new \Exception("Sensor with id " . $sensor_id->getId() . " was not found");
    }
}