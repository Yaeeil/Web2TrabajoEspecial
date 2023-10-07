<?php
class ViajeModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2tpe;charset=utf8', 'root', '');
    }


    function getDestino() {
        $query = $this->db->prepare("SELECT * FROM viajes");
        $query->execute();
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);
        return $viajes;
    }
    //SELECT * FROM viajes
   
    function getCliente($id ){
        $queryCliente = $this->db->prepare("SELECT Nombre, Apellido, id_Cliente FROM clientes WHERE id_Cliente = ? ");
        $queryCliente->execute([$id]);
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

  
    function getDetails($id){
        $query = $this->db->prepare("SELECT * FROM viajes WHERE ID_Viaje = ?");
        $query->execute([$id]);
        $viajes = $query->fetch(PDO::FETCH_OBJ);
    
        return $viajes;
    }
    
}