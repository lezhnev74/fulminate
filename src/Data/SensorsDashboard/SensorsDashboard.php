<?php
namespace src\Data\SensorsDashboard;

use src\Data\Sensor\Id;
use src\Data\Sensor\Status;

class SensorsDashboard
{
    protected $sensors = [];
    
    /**
     * Factory method
     *
     * @param array $config
     *
     * @return SensorsDashboard
     */
    static public function fromConfig(array $config): self
    {
        
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