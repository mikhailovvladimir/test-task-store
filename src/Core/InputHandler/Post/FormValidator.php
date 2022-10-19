<?php

namespace Core\InputHandler\Post;

class FormValidator
{
    private $post;

    public function __construct()
    {
        $this->post = $_POST;
    }

    public function setRules(array $config)
    {
        $resultValidation = [];
        $inputName = $config['name'];

        $rulesFormConfig = include_once __DIR__ . '/../RulesConfig/rules.php';

        foreach ($config['rules'] as $rule) {
            if (!empty($rulesFormConfig[$rule])) {
                $method = $rulesFormConfig[$rule]['method'];
                return $this->$method($inputName);
            }
        }

        return $resultValidation;
    }

    private function isRowExists(string $row)
    {
        if (isset($this->post[$row])) {
            return true;
        }

        return false;
    }

    private function isRequired(string $row)
    {
        if (!empty($this->post[$row])) {
            return $this->post[$row];
        }

        return false;
    }
}