<?php

class ViajeView
{
   
    public function showDestino($viajes)
    {
        require_once "templates/ViajesDestinos.phtml";
    }

    public function showDetailsViaje($viaje, $cliente)
    {
        $viajes = $viaje;
        $clientes = $cliente;
        require_once "templates/ViajesDetalles.phtml";
    }


    public function formularioActualizarViaje($cliente, $viaje, $id)
    {
        $clientes = $cliente;
        $viajes = $viaje;
        $id_V = $id;
        require_once "templates/formActualizarViaje.phtml";
    }
    public function formularioAgregarViaje($cliente)
    {
        $clientes = $cliente;
        require_once "templates/formularioAgregarViaje.phtml";
    }
    public function showError($error)
    {
        $errores = $error;
        require_once "templates/errores.phtml";
    }
}
