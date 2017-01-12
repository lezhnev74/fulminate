<?php
namespace src\Data\Sensor;

class Id
{
    /** @var  string */
    private $id;
    
    /**
     * Id constructor.
     *
     * @param string $id
     */
    public function __construct($id) { $this->id = $id; }
    
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    
    public function isEqual(Id $id): bool
    {
        return $id->getId() == $this->getId();
    }
}