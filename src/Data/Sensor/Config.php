<?php
namespace Fulminate\Data\Sensor;

class Config
{
    private $config = [];
    
    /**
     * Config constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        
        $this->validate();
    }
    
    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }
    
    private function validate()
    {
        // TODO MIGRATE TO BETTER ARRAY STRUCTURE VALIDATION TOOL
        
        $pattern = [
            '*' => [
                'id' => ':string',
                'name' => ':string',
                'type' => [
                    'type' => ':string in(active,passive)',
                    'status_update_frequency?' => ':string min(1)',
                    'url?' => ':string min(1)',
                    'host?' => ':string min(1)',
                    'https?' => ':boolean',
                    'ip_list?' => [
                        '*' => ':string',
                    ],
                ],
                'rules' => [
                    ':string' => ':array',
                ],
            ],
        ];
        
        \matchmaker\catches($this->config, $pattern);
    }
    
}