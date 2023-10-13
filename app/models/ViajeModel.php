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
        $query = $this->db->prepare("SELECT * FROM viajes WHERE id_viaje=?");
        $query->execute([$id]);
        $viajes = $query->fetch(PDO::FETCH_OBJ);
        return $viajes;
    }


   

    function getDetails($id)
    {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE id_viaje = ?");
        $query->execute([$id]);
        $viajes = $query->fetch(PDO::FETCH_OBJ);
        return $viajes;
    }

    function addViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $cliente)
    {
        $query = $this->db->prepare('INSERT INTO viajes (destino, fecha_salida, fecha_regreso, descripcion, precio, id_cliente) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$destino, $fechaS, $fechaR, $descripcion, $precio, $cliente]);
        return $this->db->lastInsertId();
    }

    function getViajesByClienteId($id)
    {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE id_cliente = ?");
        $query->execute([$id]);
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);
        return $viajes;
    }

    function deleteViaje($id)
    {
        $query = $this->db->prepare('DELETE FROM viajes WHERE id_viaje = ?');
        $query->execute([$id]);
    }



    function updateViaje($destino, $fechaS, $fechaR, $descripcion, $precio, $cliente, $id)
    {
        $query = $this->db->prepare('UPDATE viajes SET destino = ?, fecha_salida = ?, fecha_regreso = ?, descripcion = ?, precio = ?, id_cliente = ? WHERE id_viaje = ?');
        $query->execute([$destino, $fechaS, $fechaR, $descripcion, $precio, $cliente, $id]);
    }
}
