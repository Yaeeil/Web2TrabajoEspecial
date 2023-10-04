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

<<<<<<< HEAD
    public function showDestino() {

=======
    public function showDestinos() {
   
>>>>>>> e06f4959fb4f06a872e84d082d6bec172abc1f78
        $viaje = $this->model->getDestino();
        $valor=$this->model->getIdViaje();
        $this->view->showDestino($viaje, $valor);
    }

<<<<<<< HEAD

    public function showDetailsViaje($id) {
        // obtengo tareas del controlador
        $viaje = $this->model->getDetails($id);
        // $idCliente=$this->model->getIdCliente($id);
        // $cliente=$this->model->getNombreCliente($idCliente);

        $cliente = $this->model->getCliente($viaje->id_Cliente);

=======
    public function showDetails($id) {
        $viaje = $this->model->getDetails($id);
       $idCliente=$this->model->getIdCliente($id);
       $cliente=$this->model->getInfoCliente($idCliente);
        
>>>>>>> e06f4959fb4f06a872e84d082d6bec172abc1f78
        // muestro las tareas desde la vista

        $this->view->showDetailsViaje($viaje, $cliente);
    }
}