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
    
    function getCliente($id ){
        $queryCliente = $this->db->prepare("SELECT Nombre, Apellido, id_Cliente FROM clientes WHERE id_Cliente = ? ");
        $queryCliente->execute([$id]);
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    function getAllClientes(){
        $queryCliente = $this->db->prepare("SELECT * FROM clientes ");
        $queryCliente->execute();
        $clientes = $queryCliente->fetch(PDO::FETCH_OBJ);
        return $clientes;
    }

    function getDetails($id){
        $query = $this->db->prepare("SELECT * FROM viajes WHERE ID_Viaje = ?");
        $query->execute([$id]);
        $viajes = $query->fetch(PDO::FETCH_OBJ);
        return $viajes;
    }

    function addViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $idCliente) {
        $query = $this->db->prepare('INSERT INTO viajes (Destino, FechaSalida, FechaRegreso, Descripcion, Precio, id_Cliente) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$destino, $fechaS, $fechaR, $descripcion, $precio, $idCliente]);
        return $this->db->lastInsertId();
    }


    function deleteViaje($id) {
        $query = $this->db->prepare('DELETE FROM viajes WHERE ID_Viaje = ?');
        $query->execute([$id]);
    }


    //aca?? o le paso el id para el router o todo para cargar
    function updateViaje($id) {
        $query = $this->db->prepare('UPDATE viajes SET Destino = ?, FechaSalida = ?, FechaRegreso = ?, Descripcion = ?, Precio = ?, id_Cliente = ? WHERE ID_Viaje = ?');
        $query->execute([$destino, $fechaS, $fechaR, $descripcion, $precio, $idCliente, $id]);
    }

}