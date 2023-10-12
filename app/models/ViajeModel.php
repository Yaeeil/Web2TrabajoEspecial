<?php
class ViajeModel
{
    private $db;

    function __construct()
    {
        $this->db = setupDB();
    }


    function getDestino()
    {
        $query = $this->db->prepare("SELECT * FROM viajes");
        $query->execute();
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);
        return $viajes;
    }
    function getDestinoById($id)
    {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE ID_Viaje=?");
        $query->execute([$id]);
        $viajes = $query->fetch(PDO::FETCH_OBJ);
        return $viajes;
    }

    //y este
    function getAllClientes()
    {
        $queryCliente = $this->db->prepare("SELECT * FROM clientes ");
        $queryCliente->execute();
        $clientes = $queryCliente->fetchAll(PDO::FETCH_OBJ);
        return $clientes;
    }

    function getDetails($id)
    {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE ID_Viaje = ?");
        $query->execute([$id]);
        $viajes = $query->fetch(PDO::FETCH_OBJ);
        return $viajes;
    }

    function addViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $cliente)
    {
        $query = $this->db->prepare('INSERT INTO viajes (Destino, FechaSalida, FechaRegreso, Descripcion, Precio, Id_Cliente) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$destino, $fechaS, $fechaR, $descripcion, $precio, $cliente]);
        return $this->db->lastInsertId();
    }


    function deleteViaje($id)
    {
        $query = $this->db->prepare('DELETE FROM viajes WHERE ID_Viaje = ?');
        $query->execute([$id]);
    }



    function updateViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $cliente, $id)
    {
        $query = $this->db->prepare('UPDATE viajes SET Destino = ?, FechaSalida = ?, FechaRegreso = ?, Descripcion = ?, Precio = ?, id_Cliente = ? WHERE ID_Viaje = ?');
        $query->execute([$destino, $fechaS, $fechaR, $descripcion, $precio, $cliente, $id]);
    }
}
