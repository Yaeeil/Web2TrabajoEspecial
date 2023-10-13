<?php

class ViajeView
{

    public function showDestino($viaje, $isAdmin=false)
    {
        $viajes=$viaje;
        require_once "templates/ViajesDestinos.phtml";
    }

    public function showDetailsViaje($viaje, $cliente, $isAdmin = false)
{
        $viajes=$viaje;
        $clientes=$cliente;
        require_once "templates/ViajeDetalles.phtml";
    }


    public function formularioActualizarViaje($viaje, $cliente, $isAdmin=false)
    {
        $viajes=$viaje;
        $clientes=$cliente;
        require_once "templates/FormActualizarViaje.phtml";
    }
    public function formularioAgregarViaje($cliente, $isAdmin=false)
    {
        $clientes=$cliente;
        require_once "templates/FormAgregarViaje.phtml";
    }
    public function showError($error)
    {
        $errores = $error;
        require_once "templates/Errores.phtml";
    }
}
