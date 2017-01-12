<?php
namespace Fulminate\Data\Sensor;

use src\Data\Sensor\Id;
use src\Data\Sensor\Rule\Bag;
use src\Data\Sensor\Status;
use src\Data\Sensor\Type;

class Sensor
{
    /** @var  Status */
    protected $status;
    /** @var  Id */
    protected $id;
    /** @var  string */
    protected $name;
    /** @var  Type */
    protected $type;
    /** @var  Bag */
    protected $rules_bag;
    
    /**
     * Sensor constructor.
     *
     * @param Id     $id
     * @param string $name
     * @param Type   $type
     * @param Bag    $rules_bag
     */
    public function __construct(Id $id, string $name, Type $type, Bag $rules_bag, Status $status)
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->type      = $type;
        $this->rules_bag = $rules_bag;
        $this->status    = $status;
    }
    
    
    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }
    
    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }
    
    /**
     * @return Bag
     */
    public function getRulesBag(): Bag
    {
        return $this->rules_bag;
    }
    
    public function isActiveType(): bool
    {
        return $this->getType()->isActive();
    }
    
    public function changeStatus(Status $new_status)
    {
        return new static(
            $this->getId(),
            $this->getName(),
            $this->getType(),
            $this->getRulesBag(),
            $new_status
        );
    }
    
}