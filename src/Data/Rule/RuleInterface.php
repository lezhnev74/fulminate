<?php
namespace Fulminate\Data\Rule;


interface RuleInterface
{
    /**
     * If problem arises - should throw an exception
     *
     * @var $sensor_status
     *
     * @throws RuleFailed
     *
     * @return void
     */
    function validate($sensor_status);
    
    /**
     * Return the name of this rule for reporting
     *
     * @return string
     */
    function getName():  string;
}