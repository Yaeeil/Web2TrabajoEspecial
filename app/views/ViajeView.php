<?php
class ViajeView{
    public function showDestino($viajes) {

        require_once "templates/ViajesDestinos.phtml";
        }
    
    public function showDetailsViaje($viajes, $clientes) {
        $datosViaje = $viajes;
        $datosCliente = $clientes;
       require_once "templates/ViajesDetalles.phtml";
    }
    
  
   
}