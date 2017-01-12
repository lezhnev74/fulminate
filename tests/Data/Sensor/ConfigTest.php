<?php
namespace Tests\Data\Sensor;

use Fulminate\Data\Sensor\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    
    function config_provider()
    {
        return [
            [
                [
                    [
                        'id' => 's1', // unique ID of this sensor
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
                ],
            ],
            [
                [
                    [
                        'id' => 's2',
                        'name' => 'API queue health',
                        'type' => [
                            'type' => 'passive',
                        ],
                        'rules' => [
                            'http_code_regexp' => [
                                'pattern' => '#^200$#',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
    
    /**
     * @dataProvider config_provider
     */
    function test_config_validates_config($sensors_config)
    {
        new Config($sensors_config);
    }
    
}