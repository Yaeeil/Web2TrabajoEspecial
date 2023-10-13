<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once './app/controllers/HomeController.php';
require_once './app/controllers/ClienteController.php';
require_once './app/controllers/ViajeController.php';
require_once './app/controllers/AuthController.php';

$action = 'Home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);

AuthHelper::init();
switch ($params[0]) {
    case 'Home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'Clientes':
        $controller = new ClienteController();
        $controller->showAllClientes();
        break;
    case 'ClienteDetalles':
        $controller = new ClienteController();
        $controller->showDetailsCliente($params[1]);
        break;
    case 'FormAgregarCliente':
        $controller = new ClienteController();
        $controller->formAgregarCliente();
        break;
    case 'AgregarCliente':
        $controller = new ClienteController();
        $controller->addCliente();
        break;
    case 'FormActualizarCliente':
        $controller = new ClienteController();
        $controller->formActualizarCliente($params[1]);
        break;
    case 'ActualizarCliente':
        $controller = new ClienteController();
        $controller->updateCliente($params[1]);
        break;
    case 'EliminarCliente':
        $controller = new ClienteController();
        $controller->deleteCliente($params[1]);
        break;

    case 'Viajes':
        $controller = new ViajeController();
        $controller->showDestino();
        break;
    case 'ViajeDetalles':
        $controller = new ViajeController();
        $controller->showDetailsViaje($params[1]);
        break;
    case 'FormAgregarViaje':
        $controller = new ViajeController();
        $controller->formAgregarViajes();
        break;
    case 'AgregarViaje':
        $controller = new ViajeController();
        $controller->addViaje();
        break;
    case 'EliminarViaje':
        $controller = new ViajeController();
        $controller->deleteViaje($params[1]);
        break;
    case 'FormActualizarViaje':
        $controller = new ViajeController();
        $controller->formActualizarViajes($params[1]);
        break;
    case 'ActualizarViaje':
        $controller = new ViajeController();
        $controller->updateViaje($params[1]);
        break;
    case 'LogIn':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'Autorizacion':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'LogOut':
        $controller = new AuthController();
        $controller->logOut();
        break;
    default:
        $controller=new ViajeController();
        $controller->showError("404 PAGE NOT FOUND");
        break;
}
