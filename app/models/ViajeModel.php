<?php
class ViajeModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2tpe;charset=utf8', 'root', '');
    }


    function getDestino() {
        $query = $this->db->prepare("SELECT Destino FROM viajes");
        $query->execute();


        $viaje = $query->fetchAll(PDO::FETCH_OBJ);

        return $viaje;
    }

    function getIdViaje() {
        $query = $this->db->prepare("SELECT ID_Viaje FROM viajes");
        $query->execute();
        $viaje = $query->fetchAll(PDO::FETCH_OBJ);
        return $viaje;
    }

    function getIdCliente($id) {
        $query = $this->db->prepare("SELECT id_Cliente FROM viajes WHERE ID_viaje= ?");
        $query->execute([$id]);


        $viaje = $query->fetchAll(PDO::FETCH_OBJ);

        return $viaje;
    }

    function getCliente($id ){
        $queryCliente = $this->db->prepare("SELECT Nombre, Apellido, id_Cliente FROM clientes WHERE id_Cliente = ? ");
        $queryCliente->execute([$id]);
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    function getNombreCliente($id) {
        $queryCliente = $this->db->prepare("SELECT Nombre, Apellido, id_Cliente FROM clientes WHERE id_Cliente = :idCliente");
        $queryCliente->bindParam(':idCliente', $id, PDO::PARAM_INT);
        $queryCliente->execute();
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
        $query = $this->db->prepare('SELECT Nombre, Apellido, ID_Cliente FROM clientes WHERE ID_Cliente= ?');
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
        
    }
  
    function getDetails($id){
        $query = $this->db->prepare("SELECT * FROM viajes WHERE ID_Viaje = ?");
        $query->execute([$id]);
        $viaje = $query->fetch(PDO::FETCH_OBJ);
    
        return $viaje;
    }
    
}