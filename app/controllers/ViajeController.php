<?php
require_once './app/models/ViajeModel.php';
require_once './app/views/ViajeView.php';
require_once './auth/AuthHelper.php';

class ViajeController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ViajeModel();
        $this->view = new ViajeView();
    }

    public function showDestino()
    {
        $viajes = $this->model->getDestino();
        $this->view->showDestino($viajes);
    }


    public function showDetailsViaje($id)
    {
        $viaje = $this->model->getDetails($id);
        $cliente = $this->model->getCliente($viaje->id_Cliente);
        $this->view->showDetailsViaje($viaje, $cliente);
    }

    //es el intermediario
    //hay que hacer que no se pueda acceder sin estar logueado a esta funcion 
    public function formAgregarViajes()
    {
        AuthHelper::verify();
        $clientes = $this->model->getAllClientes();
        $this->view->formularioAgregarViaje($clientes);
    }

    //hay que hacer que no se pueda acceder sin estar logueado a esta funcion 
    public function addViaje()
    {
        AuthHelper::verify();
        $destino = $_POST['destino'];
        $fechaSalida = $_POST['fechaSalida'];
        $fechaRegreso = $_POST['fechaRegreso'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cliente = $_POST['cliente'];

        if (empty($destino) || empty($fechaSalida) || empty($fechaRegreso) || empty($descripcion) || empty($precio) || empty($cliente)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
        $id = $this->model->addViaje($destino, $fechaSalida, $fechaRegreso, $descripcion, $precio, $cliente);
        if ($id) {
            header('Location: ' . BASE_URL . 'viajes');
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    function deleteViaje($id)
    {
        AuthHelper::verify();
        try {
            $this->model->deleteViaje($id);
            header('Location: ' . BASE_URL . 'viajes');
        } catch (PDOException $e) {
            $this->view->showError("No se puede eliminar, elimine otro elemento");
        }
    }


    //hay que hacer que no se pueda acceder sin estar logueado a esta funcion 
    //update ver como arreglar e implementar el manejo de error
    public function formActualizarViajes($id)
    {
        AuthHelper::verify();
        $viajes = $this->model->getDestinoById($id); // Pasar $id como un valor, no un array
        $clientes = $this->model->getAllClientes();
        $this->view->formularioActualizarViaje($clientes, $viajes, $id);
    }

    //hay que hacer que no se pueda acceder sin estar logueado a esta funcion 
    public function updateViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $cliente, $id)
    {
        AuthHelper::verify();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $destino = $_POST['destino'];
            $fechaS = $_POST['fechaSalida'];
            $fechaR = $_POST['fechaRegreso'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cliente = $_POST['cliente'];
            $this->model->updateViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $cliente, $id);
            header('Location: ' . BASE_URL . 'viajes');
            die();
        }
    }
}
