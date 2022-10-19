<?php

namespace Core\InputHandler;

abstract class Validation
{
    protected $inputParams;

    public $errors;

    public function run()
    {
        $configRules = $this->getValidationRules();
        $rulesHandler = new Rule();
    }

    abstract protected function setInputParams();

    abstract protected function getValidationRules(): array;
}