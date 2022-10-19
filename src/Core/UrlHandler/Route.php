<?php

namespace Core\UrlHandler;

use Core\Exceptions\NotFoundPage;

final class Route
{
    private $url;

    private $routeConfiguration;

    public function __construct()
    {
        $this->url = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING);
        $this->routeConfiguration = require __DIR__ . '/../../Config/routes.php';
    }

    public function start()
    {
        foreach ($this->routeConfiguration as $pattern => $controllerAndAction) {
            preg_match($pattern, $this->url, $matches);
            if (!empty($matches)) {
                $controllerName = $controllerAndAction[0];
                $actionName = $controllerAndAction[1];
                break;
            }
        }

        if (empty($controllerName) or empty($actionName)) {
            throw new NotFoundPage();
        }

        unset($matches[0]);
        $controller = new $controllerName;
        $controller->$actionName(...$matches);
    }
}