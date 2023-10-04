<?php
require_once './app/controllers/HomeController.php';
require_once './app/controllers/ClienteController.php';
require_once './app/controllers/ViajeController.php'; // Agrega esta línea

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'viajes':
        $controller = new ViajeController();
        $controller->showDestino();
        break; 
    case 'clientes':
        $controller = new ClienteController();
        $controller->showAllClientes();
        break; 
    case 'viaje':
        $controller = new ViajeController();
        $controller->showDetailsViaje($params[1]);
        break; 
    case 'cliente':
        $controller = new ClienteController();
        $controller->showDetailsCliente($params[1]);
        break; 
    default:
        echo "404 Page Not Found";
        break;
}
