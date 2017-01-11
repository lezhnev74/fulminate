<?php
namespace Fulminate\Data\Rule;


interface RuleInterface
{
    /**
     * If problem arises - should throw an exception
     *
     * @throws RuleFailed
     *
     * @return void
     */
    function validate();
}