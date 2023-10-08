<?php
class clienteModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2tpe;charset=utf8', 'root', '');
    }
    //cambiale el nombre xq no es viajes pero solo hace este 
    function getAllClientes() {
        $query = $this->db->prepare('SELECT * FROM clientes');
        $query->execute();


        $viaje = $query->fetchAll(PDO::FETCH_OBJ);

        return $viaje;
    }

//este no o sea si pero seria de viajes bro
function getDetails($id){
        $query = $this->db->prepare("SELECT * FROM clientes WHERE ID_cliente = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    
        // $cliente es un objeto con los detalles del cliente
        $cliente = $query->fetch(PDO::FETCH_OBJ);
    
        return $cliente;
    }
    
}