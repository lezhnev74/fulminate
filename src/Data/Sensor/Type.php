<?php
namespace Fulminate\Data\Sensor;

class Type
{
    /** @var  string */
    private $type;
    /** @var  string */
    private $status_update_frequency;
    /** @var  string */
    private $url;
    /** @var  string */
    private $host;
    /** @var  boolean */
    private $https;
    /** @var array */
    private $ip_list = [];
    
    /**
     * Type constructor.
     *
     * @param string $type
     * @param string $status_update_frequency
     * @param string $url
     * @param string $host
     * @param bool   $https
     * @param array  $ip_list
     */
    public function __construct($type, $status_update_frequency, $url, $host, $https, array $ip_list)
    {
        $this->type                    = $type;
        $this->status_update_frequency = $status_update_frequency;
        $this->url                     = $url;
        $this->host                    = $host;
        $this->https                   = $https;
        $this->ip_list                 = $ip_list;
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @return string
     */
    public function getStatusUpdateFrequency(): string
    {
        return $this->status_update_frequency;
    }
    
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    
    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }
    
    /**
     * @return bool
     */
    public function isHttps(): bool
    {
        return $this->https;
    }
    
    /**
     * @return array
     */
    public function getIpList(): array
    {
        return $this->ip_list;
    }
    
    public function isActive(): bool
    {
        return $this->type == "active";
    }
}