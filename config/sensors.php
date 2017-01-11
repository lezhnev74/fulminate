<?php

return [
    
    'sensors' => [
        [
            'name' => 'API available',
            'type' => [
                'type' => 'active',
                // how often to update status
                'status_update_frequency' => '1 hour',
                //Min - 1 minute, Examples: 1 minute, 1 hour, 24 hours, 1 day, 1week
                'url' => '/api/health',
                'host' => 'stage.api.babystep.expert',
                'https' => true,
                'ip_list' => ['72.291.11.22'] // can be null to resolve IP from DNS
            ],
            // Rules detect problem in status update
            'rules' => [
                [
                    // if current status was lastly updated more than TIME_PERIOD ago
                    'type' => 'stale_status',
                    'time_period' => '1 hour',
                ],
                [
                    // Check if status matches against the PATTERN, otherwise consider it failed
                    'type' => 'regexp',
                    'pattern' => '#^OK$#',
                ],
            ],
        ],
        
        [
            'name' => 'API queue health',
            'type' => [
                'type' => 'passive',
                'key' => 'api-queue-health' // to use in URL generation to receive passive status updates
            ],
            'rules' => [
                'type' => 'http_code_regexp',
                'pattern' => '#^200$#',
            ],
        ],
    ],
];