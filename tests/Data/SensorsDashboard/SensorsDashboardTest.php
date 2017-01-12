<?php
namespace Tests\Data\Sensor;

use Fulminate\Data\Sensor\Config;
use Fulminate\Data\SensorsDashboard\SensorsDashboard;

class SensorsDashboardTest extends \PHPUnit_Framework_TestCase
{
    
    function test_dashboard_factory_works_as_expected()
    {
        $config_array = [
            [
                'id' => 's1',
                'name' => 'API available',
                'type' => [
                    'type' => 'active',
                    'status_update_frequency' => '1 hour',
                    'url' => '/api/health',
                    'host' => 'stage.api.babystep.expert',
                    'https' => true,
                    'ip_list' => ['72.291.11.22'] // can be null to resolve IP from DNS
                ],
                'rules' => [
                    'stale_status' => [
                        'time_period' => '1 hour',
                    ],
                    'regexp' => [
                        'pattern' => '#^OK$#',
                    ],
                ],
            ],
            [
                'id' => 's2',
                'name' => 'API available 2',
                'type' => [
                    'type' => 'passive',
                ],
                'rules' => [
                    'stale_status' => [
                        'time_period' => '1 hour',
                    ],
                ],
            ],
            [
                'id' => 's3',
                'name' => 'API available 2',
                'type' => [
                    'type' => 'active',
                    'status_update_frequency' => '1 hour',
                    'url' => '/api/health',
                    'host' => 'stage.api.babystep.expert',
                    'https' => true,
                ],
                'rules' => [
                    'stale_status' => [
                        'time_period' => '1 hour',
                    ],
                ],
            ],
        ];
        
        $config    = new Config($config_array);
        $dashboard = SensorsDashboard::fromConfig($config);
        
        $this->assertEquals(3, count($dashboard->getSensors()));
        $this->assertEquals(1, count($dashboard->getPassiveSensors()));
        $this->assertEquals(2, count($dashboard->getActiveSensors()));
    }
    
}