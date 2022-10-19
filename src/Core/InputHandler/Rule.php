<?php

namespace Core\InputHandler;

class Rule
{
    private $rules;

    public function __construct()
    {
        $this->rules = include_once __DIR__ . '/Config/rules.php';
    }

    public function checkInputParams()
    {

    }

    public function isRequired(string $inputName, array $params)
    {
        if (!empty($params[$inputName])) {
            return $params[$inputName];
        }

        return false;
    }

    public function isString(string $param)
    {
        return filter_var($param, FILTER_SANITIZE_STRING);
    }

    public function isInteger(int $param)
    {
        return filter_var($param, FILTER_SANITIZE_NUMBER_INT);
    }
}