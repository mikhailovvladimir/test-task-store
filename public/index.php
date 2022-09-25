<?php
try {
    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    });

    $route = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING);

    $routes = require __DIR__ . '/../src/Config/routes.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new \Core\Exceptions\NotFoundPage();
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\Core\Exceptions\NotFoundPage $e) {
    $view = new Core\View\Render(__DIR__ . '/../src/TestTask/View/');
    $view->getHtmlPage('errors/404.php', ['error' => $e->getMessage()], 404);
} catch (\Throwable $e) {
    $view = new Core\View\Render(__DIR__ . '/../src/TestTask/View/');
    $view->getHtmlPage('errors/500.php', ['error' => $e->getMessage()], 500);
}