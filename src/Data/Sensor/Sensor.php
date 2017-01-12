<?php
namespace Fulminate\Data\Sensor;

use Fulminate\Data\Rule\RuleFailed;

abstract class Sensor
{
    /**
     * Contains all the rules that were failed during validation
     *
     * [RuleName => Message]
     *
     * @var array
     */
    protected $failed_rules = [];
    protected $status       = null;
    /**
     * Array of Rule objects
     *
     * @var array
     */
    protected $rules = [];
    
    /**
     * Validates current status of the Sensor against all rules
     *
     * @return bool
     */
    protected function validate(): bool
    {
        foreach($this->rules as $rule) {
            try {
                $rule->validate($this->status);
            } catch(RuleFailed $e) {
                $this->failed_rules[ $rule->getName() ] = $e->getMessage();
            } catch(\Exception $e) {
                $this->failed_rules[ $rule->getName() ] = "General problem";
            }
        }
    }
    
    /**
     * @return array
     */
    public function getFailedRules(): array
    {
        return $this->failed_rules;
    }
    
    /**
     * @return null
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    
}