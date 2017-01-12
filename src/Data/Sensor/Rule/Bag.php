<?php
namespace Fulminate\Data\Sensor\Rule;

use Fulminate\Data\Sensor\Status;

class Bag
{
    /** @var array of Rules */
    private $rules = [];
    
    /**
     * Validates current status of the Sensor against all rules
     *
     * @return bool
     */
    protected function validateStatus(Status $status): bool
    {
        foreach($this->rules as $rule) {
            try {
                $rule->validate($status);
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
}