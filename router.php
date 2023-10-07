<?php
require_once './app/controllers/HomeController.php';
require_once './app/controllers/ClienteController.php';
require_once './app/controllers/ViajeController.php'; 
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
       case 'logIn':
        $controller = new SesionController();
        $controller->showLogin(); 
        break;
        case 'autorizacion':
        $controller = new SesionController();
        $controller->auth();
        break;
        case 'logout':
        $controller = new SesionController();
        $controller->logout();
        break;
        case 'agregarViaje':
            $controller = new ViajeController();
            $controller->addViaje();
            break;
        case 'eliminarViaje':
            $controller = new ViajeController();
            $controller->deleteViaje($params[1]);
            break;
        case 'actualizarViaje':
            $controller = new ViajeController();
            $controller->updateViaje($params[1]);
            break;
    default:
        echo "404 Page Not Found";
        break;
}
