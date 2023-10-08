<?php
require_once './app/models/ClienteModel.php';
require_once './app/views/ClienteView.php';

class ClienteController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ClienteModel();
        $this->view = new ClienteView();
        
    }

    public function showAllClientes(){
        $clientes = $this->model->getAllClientes();
        $this->view->showAllClientes($clientes);
    }

    public function showDetailsCliente($id) {
        $cliente = $this->model->getDetails($id);
        $this->view->showDetailscliente($cliente, $cliente);
    }
}