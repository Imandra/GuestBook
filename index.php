<?php
require_once __DIR__ . '/autoload.php';

$controllerClassName = 'GuestBookController';
$action = isset($_POST['action']) ? $_POST['action'] : 'Index';

try {
    $controller = new $controllerClassName;
    $method = 'action' . $action;
    $controller->$method();
} catch (Exception $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('error.php');
}