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

    public function showDestinos() {
   
        $viaje = $this->model->getDestino();
        $valor=$this->model->getIdViaje();
        $this->view->showDestino($viaje, $valor);
    }
    

    public function showDetails($id) {
        $viaje = $this->model->getDetails($id);
       $idCliente=$this->model->getIdCliente($id);
       $cliente=$this->model->getInfoCliente($idCliente);
        
        // muestro las tareas desde la vista
        $this->view->showDetailsViaje($viaje, $cliente);
    }
}