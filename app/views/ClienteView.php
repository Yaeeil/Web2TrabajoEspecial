<?php
class ClienteView
{
    public function showClientes($clientes)
    {
        require_once "templates/Clientes.phtml";
    }

    public function showDetailsCliente($cliente, $viajes)
    {
        require_once "templates/ClienteDetalles.phtml";
    }
    public function formActualizarCliente($clientes)
    {
        require_once "templates/formActualizarCliente.phtml";
    }
    public function formAgregarCliente($cliente)
    {
        $clientes = $cliente;

        require_once "templates/formAgregarCliente.phtml";
    }
    public function showError($error)
    {
        $errores = $error;
        require_once "templates/errores.phtml";
    }
}