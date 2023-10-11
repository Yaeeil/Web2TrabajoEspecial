<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once 'templates/header.phtml';

require_once './app/controllers/HomeController.php';
require_once './app/controllers/ClienteController.php';
require_once './app/controllers/ViajeController.php';
require_once './app/controllers/AuthController.php';

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
    case 'clientes':
        $controller = new ClienteController();
        $controller->showAllClientes();
        break;
    case 'clienteDetalles':
        $controller = new ClienteController();
        $controller->showDetailsCliente($params[1]);
        break;
    case 'formAgregarCliente':
        $controller = new ClienteController();
        $controller->formAgregarCliente();
        break;
    case 'agregarCliente':
        $controller = new ClienteController();
        $controller->addCliente($params[1]);
        break;
    case 'formActualizarCliente':
        $controller = new ClienteController();
        $controller->formActualizarCliente($params[1]);
        break;
    case 'actualizarCliente':
        $controller = new ClienteController();
        $controller->updateCliente($params[1]);
        break;
    case 'eliminarCliente':
        $controller = new ClienteController();
        $controller->deleteCliente($params[1]);
        break;

    case 'viajes':
        $controller = new ViajeController();
        $controller->showDestino();
        break;
    case 'viaje':
        $controller = new ViajeController();
        $controller->showDetailsViaje($params[1]);
        break;
    case 'formAgregarViaje':
        $controller = new ViajeController();
        $controller->formAgregarViajes();
        break;
    case 'agregarViaje':
        $controller = new ViajeController();
        $controller->addViaje();
        break;
    case 'eliminarViaje':
        $controller = new ViajeController();
        $controller->deleteViaje($params[1]);
        break;
    case 'formActualizarViaje':
        $controller = new ViajeController();
        $controller->formActualizarViajes($params[1]);
        break;
    case 'actualizarViaje':
        $controller = new ViajeController();
        $controller->updateViaje($params[1]);
        break;
    case 'logIn':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'autorizacion':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logOut':
        $controller = new AuthController();
        $controller->logOut();
        break;
    default:
        echo "404 Page Not Found";
        break;
}
require_once 'templates/footer.phtml';
