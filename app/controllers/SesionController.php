<?php
require_once './app/views/SesionView.php';
class SesionController {
   // private $model;
    private $view;

    public function __construct() {
       // $this->model = new ViajeModel();
        $this->view = new SesionView();
        
    }

    public function showSesion() {
        $this->view->showSesion();
    }
}