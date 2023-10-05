<?php
require_once './app/models/ClienteModel.php';
require_once './app/views/ClienteView.php';

class ClienteController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ClienteModel();
        $this->view = new ClienteView();
        
    }

    // public function showCliente() {
    //     $cliente = $this->model->getCliente();
    //     $idCliente=$this->model->getIdcliente($cliente);
    //     $this->view->showCliente($cliente, $idCliente);
    // }
    public function showAllClientes(){
        $clientes = $this->model->getAllClientes();
        $this->view->showAllClientes($clientes);
    }

    public function showDetailsCliente($id) {
        // obtengo tareas del controlador
        $cliente = $this->model->getDetails($id);
        $idCliente=$this->model->getIdCliente($id);
        $cliente=$this->model->getNombreCliente($idCliente);
        
        // muestro las tareas desde la vista
        $this->view->showDetailscliente($cliente, $cliente);
    }
}