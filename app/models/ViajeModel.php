<?php
class ViajeModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2tpe;charset=utf8', 'root', '');
    }


    function getDestino() {
        $query = $this->db->prepare('SELECT Destino FROM viajes');
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
        $query = $this->db->prepare('SELECT id_Cliente FROM viajes WHERE ID_viaje= :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();


        $viaje = $query->fetchAll(PDO::FETCH_OBJ);

        return $viaje;
    }


    function getNombreCliente($id) {
        // Primero, obtenemos el ID del cliente asociado al viaje
        $queryIdCliente = $this->db->prepare("SELECT id_Cliente FROM viajes WHERE Id_Viaje = :id");
        $queryIdCliente->bindParam(':id', $id, PDO::PARAM_INT);
        $queryIdCliente->execute();
    
        // Obtenemos el ID del cliente
        $idCliente = $queryIdCliente->fetch(PDO::FETCH_COLUMN);
    
        // Luego, obtenemos el nombre y apellido del cliente correspondiente al ID
        $queryCliente = $this->db->prepare("SELECT Nombre, Apellido, ID_Cliente FROM clientes WHERE ID_Cliente = :idCliente");
        $queryCliente->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
        $queryCliente->execute();
    
        // Retorna el cliente asociado al viaje
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
    
        return $cliente;
    }
    
    

    function getDetails($id){
        $query = $this->db->prepare("SELECT * FROM viajes WHERE ID_Viaje = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    
        // $viaje es un objeto con los detalles del viaje
        $viaje = $query->fetch(PDO::FETCH_OBJ);
    
        return $viaje;
    }
    
}