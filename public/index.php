<?php
spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
});

use Core\Exceptions\NotFoundPage;
use Core\RequestHandler\Route;
use Core\View\Render;

try {
    $route = new Route();
    $route->start();
} catch (NotFoundPage $e) {
    $view = new Render(__DIR__ . '/../src/TestTask/View/');
    $view->getHtmlPage('errors/404.php', ['error' => $e->getMessage()], 404);
} catch (Throwable $e) {
    $view = new Render(__DIR__ . '/../src/TestTask/View/');
    $view->getHtmlPage('errors/500.php', ['error' => $e->getMessage()], 500);
}