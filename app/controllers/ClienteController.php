<?php
require_once './app/models/ClienteModel.php';
require_once './app/views/ClienteView.php';
require_once './auth/AuthHelper.php';


class ClienteController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ClienteModel();
        $this->view = new ClienteView();
    }

    public function showAllClientes()
    {
        $clientes = $this->model->getAllClientes();
        $this->view->showClientes($clientes);
    }

    public function showDetailsCliente($id)
    {
        $cliente = $this->model->getClienteById($id);
        $viajes = $this->model->getViajesByClienteId($id);
        $this->view->showDetailscliente($cliente, $viajes);
    }
    public function formAgregarCliente()
    {
        AuthHelper::verify();
        $clientes = $this->model->getAllClientes();
        $this->view->formAgregarCliente($clientes);
    }

    public function addCliente()
    {
        AuthHelper::verify();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correoElectronico = $_POST['correoElectronico'];
        $fechaDeNacimiento = $_POST['fechaDeNacimiento'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];

        if (empty($nombre) || empty($apellido) || empty($correoElectronico) || empty($fechaDeNacimiento) || empty($dni) || empty($direccion)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
        $id = $this->model->addCliente($nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion);
        if ($id) {
            header('Location: ' . BASE_URL . 'clientes');
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }
    public function formActualizarCliente($id)
    {
        AuthHelper::verify();
        $clientes = $this->model->getClienteById($id);
        $this->view->formActualizarCliente($clientes);
    }
    public function updateCliente($id)
    {
        AuthHelper::verify();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correoElectronico = $_POST['correoElectronico'];
            $fechaDeNacimiento = $_POST['desfechaDeNacimientocripcion'];
            $dni = $_POST['dni'];
            $direccion = $_POST['direccion'];
            $this->model->updateCliente($id, $nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion);
            header('Location: ' . BASE_URL . 'clientes');
            die();
            try {
                if (empty($destino) || empty($fechaS) || empty($fechaR) || empty($descripcion) || empty($precio) || empty($cliente)) {
                    $this->view->showError("Debe completar todos los campos");
                    return;
                }
                $this->model->updateCliente($id, $nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion);
            } catch (PDOException $e) {
                $this->view->showError("No se puede actualizar: " . $e->getMessage());
            }
        } else {
            $this->view->showError("Error al actualizar la tarea");
        }
    }

    function deleteCliente($id)
    {
        AuthHelper::verify();
        try {
            $this->model->deleteCliente($id);
            header('Location: ' . BASE_URL . 'clientes');
        } catch (PDOException $e) {
            $this->view->showError("No se puede eliminar, elimine otro elemento");
        }
    }
}
