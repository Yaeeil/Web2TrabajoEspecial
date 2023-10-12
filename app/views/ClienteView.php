<?php
class ClienteView
{
    public function showClientes($clientes, $isAdmin)
    {
        require_once "templates/Clientes.phtml";
    }

    public function showDetailsCliente($cliente, $viajes, $isAdmin = false)
    {
        require_once "templates/ClienteDetalles.phtml";
    }
    public function formActualizarCliente($clientes)
    {
        require_once "templates/FormActualizarCliente.phtml";
    }
    public function formAgregarCliente($cliente)
    {
        $clientes = $cliente;

        require_once "templates/FormAgregarCliente.phtml";
    }
    public function showError($error)
    {
        $errores = $error;
        require_once "templates/errores.phtml";
    }
}
