<?php
class ViajeView{
    public function showDestino($viajes) {
        require_once "templates/formularioAgregarViaje.phtml";
        require_once "templates/ViajesDestinos.phtml";
    }
    
    public function showDetailsViaje($viaje, $cliente) {
        $viajes = $viaje;
        $clientes = $cliente;
       require_once "templates/ViajesDetalles.phtml";
    }
    public function showError($error) {
        $errores=$error;
       require_once "templates/errores.phtml";
    }
    
    public function formularioActualizar() {
        require_once "templates/formActualizarViaje.phtml";
    }
}