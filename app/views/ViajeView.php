<?php
// require_once './app/models/ClienteModel.php';

class ViajeView{
    // private $clienteModel;

    // public function __construct() {
    //     $this->clienteModel = new ClienteModel();
    // }
    public function showDestino($viajes) {
        // $clientes = $this->clienteModel->getAllClientes();
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
    
    public function formularioActualizarViaje($cliente, $id, $viaje) {
        $clientes=$cliente;
        $id_V=$id;
        $viajes=$viaje;
        require_once "templates/formActualizarViaje.phtml";
    }
    public function formularioAgregarViaje($cliente) {
        $clientes=$cliente;
        require_once "templates/formularioAgregarViaje.phtml";
    }
}