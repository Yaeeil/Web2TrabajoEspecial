<?php
require_once './app/controllers/HomeController.php';
require_once './app/controllers/ViajeController.php'; // Agrega esta línea
require_once './app/controllers/SesionController.php';

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
        $controller->showDestinos();
        break; 
    case 'detalle':
        $controller = new ViajeController();
        $controller->showDetails($params[1]);
        break; 
        case 'logIn':
            $controller= new SesionController();
            $controller-> showSesion();
            break;
    default:
        echo "404 Page Not Found";
        break;
}
