<?php

class ViajeView
{

    public function showDestino($viajes, $isAdmin)
    {
        require_once "templates/ViajesDestinos.phtml";
    }

    public function showDetailsViaje($viajes, $clientes, $isAdmin = false)
    {
        require_once "templates/ViajeDetalles.phtml";
    }


    public function formularioActualizarViaje($viaje, $cliente)
    {
        require_once "templates/FormActualizarViaje.phtml";
    }
    public function formularioAgregarViaje($cliente)
    {
        require_once "templates/FormAgregarViaje.phtml";
    }
    public function showError($error)
    {
        $errores = $error;
        require_once "templates/errores.phtml";
    }
}
