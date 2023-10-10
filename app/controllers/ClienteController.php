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
        $cliente = $this->model->getDetails($id);
        $viajes = $this->model->getViajes($id);
        $this->view->showDetailscliente($cliente,$viajes);
    }
    public function formAgregarCliente(){
        AuthHelper::verify();
        $clientes = $this->model->getAllClientes();
        $this->view->formAgregarCliente($clientes);
    }
}
