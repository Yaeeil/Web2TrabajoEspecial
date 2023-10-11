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


    public function formAgregarViajes()
    {
        AuthHelper::verify();
        $clientes = $this->model->getAllClientes();
        $this->view->formularioAgregarViaje($clientes);
    }

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
            $this->view->showError("No se puede eliminar, elimine otro elemento" .  $e->getMessage());
        }
    }


    public function formActualizarViajes($id)
    {
        AuthHelper::verify();
        $viaje = $this->model->getDestinoById($id);
        $clientes = $this->model->getAllClientes();
        $this->view->formularioActualizarViaje($viaje, $clientes);
    }


    public function updateViaje($id)
    {
        AuthHelper::verify();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $destino = $_POST['destino'];
            $fechaS = $_POST['fechaSalida'];
            $fechaR = $_POST['fechaRegreso'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cliente = $_POST['cliente'];

            try {
                if (empty($destino) || empty($fechaS) || empty($fechaR) || empty($descripcion) || empty($precio) || empty($cliente)) {
                    $this->view->showError("Debe completar todos los campos");
                    return;
                }

                $this->model->updateViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $cliente, $id);
                if ($id) {
                    header('Location: ' . BASE_URL . 'viajes');
                }
            } catch (PDOException $e) {
                $this->view->showError("No se puede actualizar: " . $e->getMessage());
            }
        } else {
            $this->view->showError("Error al actualizar la tarea");
        }
    }
}
