<?php
namespace src\Data\Sensor;

use Carbon\Carbon;

/**
 * Class Status
 *
 * The value of sensor's status recieved from external systems
 *
 * @package src\Data\Sensor
 */
class Status
{
    private $status_value      = null;
    private $status_meta       = [];
    private $status_changed_at;
    
    /**
     * Status constructor.
     *
     * @param null  $status_value
     * @param array $status_meta
     */
    public function __construct($status_value, array $status_meta, Carbon $status_changed_at)
    {
        $this->status_value      = $status_value;
        $this->status_meta       = $status_meta;
        $this->status_changed_at = $status_changed_at;
    }
    
    /**
     * @return null
     */
    public function getStatusValue()
    {
        return $this->status_value;
    }
    
    /**
     * @return array
     */
    public function getStatusMeta(): array
    {
        return $this->status_meta;
    }
    
    /**
     * @return Carbon
     */
    public function getStatusChangedAt()
    {
        return $this->status_changed_at;
    }
    
    
}