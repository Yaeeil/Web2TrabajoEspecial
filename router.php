<?php
require_once './app/controllers/HomeController.php';
<<<<<<< HEAD
require_once './app/controllers/ViajeController.php'; // Agrega esta línea

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
=======

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
>>>>>>> 32950893bb905b23af962948d276903e971fa34f
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
<<<<<<< HEAD
    case 'viajes':
        $controller = new ViajeController();
        $controller->showDestino();
        break; 
    case 'detalle':
        $controller = new ViajeController();
        $controller->showDetails($params[1]);
        break; 
    default:
        echo "404 Page Not Found";
        break;
}
=======
    default: 
        echo "404 Page Not Found";
        break;
}
>>>>>>> 32950893bb905b23af962948d276903e971fa34f
