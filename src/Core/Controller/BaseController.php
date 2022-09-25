<?php

namespace Core\Controller;

use Core\View\Render;

abstract class BaseController
{
    public $render;

    public function __construct()
    {
        $this->render = new Render(__DIR__ . '/../../TestTask/View/');
    }
}