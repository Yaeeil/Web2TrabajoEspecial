<?php
require_once './app/models/ViajeModel.php';
require_once './app/views/ViajeView.php';

class ViajeController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ViajeModel();
        $this->view = new ViajeView();
        
    }

    public function showDestino() {

        $viaje = $this->model->getDestino();
        $valor=$this->model->getIdViaje();
        $this->view->showDestino($viaje, $valor);
    }


    public function showDetailsViaje($id) {
   
        $viaje = $this->model->getDetails($id);
        $cliente = $this->model->getCliente($viaje->id_Cliente);
        $this->view->showDetailsViaje($viaje, $cliente);
    }
}