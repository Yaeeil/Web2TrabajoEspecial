<?php
require_once './app/models/ClienteModel.php';
require_once './app/views/ClienteView.php';
require_once './auth/AuthHelper.php';


class ClienteController
{
    private $model;
    private $modelViaje;
    private $view;

    public function __construct()
    {
        $this->model = new ClienteModel();
        $this->modelViaje=new ViajeModel();
        $this->view = new ClienteView();
    }

    public function showAllClientes()
    {
        $isAdmin = AuthHelper::isAdmin();
        $clientes = $this->model->getAllClientes();
        $this->view->showClientes($clientes, $isAdmin);
    }

    public function showDetailsCliente($id)
    {
        $isAdmin = AuthHelper::isAdmin();
        $cliente = $this->model->getClienteById($id);
        $viajes = $this->modelViaje->getViajesByClienteId($id);
        $this->view->showDetailscliente($cliente, $viajes, $isAdmin);
    }
    public function formAgregarCliente()
    {
        AuthHelper::verify();
        $isAdmin = AuthHelper::isAdmin(); //para verificacion del header
        $clientes = $this->model->getAllClientes();
        $this->view->formAgregarCliente($clientes,$isAdmin);
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
            header('Location: ' . BASE_URL . 'Clientes');
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }
    public function formActualizarCliente($id)
    {
        $isAdmin = AuthHelper::isAdmin(); //para verificacion del header
        AuthHelper::verify();
        $clientes = $this->model->getClienteById($id);
        $this->view->formActualizarCliente($clientes, $isAdmin);
    }
    public function updateCliente($id)
    {
        AuthHelper::verify();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correoElectronico = $_POST['correoElectronico'];
            $fechaDeNacimiento = $_POST['fechaDeNacimiento'];
            $dni = $_POST['dni'];
            $direccion = $_POST['direccion'];
            try {
                if (empty($nombre) || empty($apellido) || empty($correoElectronico) || empty($fechaDeNacimiento) || empty($dni) || empty($direccion)) {
                    $this->view->showError("Debe completar todos los campos");
                    return;
                }
                $this->model->updateCliente($id, $nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion);
                if ($id) {
                    header('Location: ' . BASE_URL . 'Clientes');
                }
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
            header('Location: ' . BASE_URL . 'Clientes');
        } catch (PDOException $e) {
            $this->view->showError("No se puede eliminar, el cliente tiene un viaje asociado");
        }
    }
}
