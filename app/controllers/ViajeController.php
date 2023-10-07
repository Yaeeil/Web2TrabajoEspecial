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
        $viajes = $this->model->getDestino();
        $this->view->showDestino($viajes);
      
    }


    public function showDetailsViaje($id) {
        $viaje = $this->model->getDetails($id);
        $cliente = $this->model->getCliente($viaje->id_Cliente);
        $this->view->showDetailsViaje($viaje, $cliente);
    }

    //agrego
    public function addViaje() {
        $destino = $_POST['destino'];
        $fechaS= $_POST['fechaS'];
        $fechaL=$_POST['fechaR'];
        $descripcion = $_POST['descripcion'];
        $precio=$_POST['precio'];
        $id_cliente=$_POST['id_cliente'];

        if (empty($destino) || empty($fechaS) || empty($fechaL) || empty($descripcion) || empty($precio) || empty($id_cliente)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->addViaje($destino, $fechaS, $fechaL, $descripcion, $precio, $id_cliente);
        if ($id) {
            header('Location: ' . BASE_URL . '/MostrarViajes');
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    function deleteViaje($id) {
        try {
            $this->model->deleteViaje($id);
        header('Location: ' . BASE_URL .'/MostrarViajes');
        } catch (PDOException $e) {
         $this->view->showError("No se puede eliminar, elimine otro elemento");
    }
} 
    //update ver como arreglar e implementar el manejo de error
public function updateViaje($id) {
$this->view->formularioActualizar();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $destino = $_POST['destino'];
        $fechaS = $_POST['fechaS'];
        $fechaL = $_POST['fechaL'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_cliente = $_POST['id_cliente'];
        
        $this->model->updateViaje($destino, $fechaS, $fechaL, $descripcion, $precio, $id_cliente, $id);

        
        header('Location: ' . BASE_URL . '/MostrarViajes');
        die();
    }

}
}