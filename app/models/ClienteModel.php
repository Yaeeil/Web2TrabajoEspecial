<?php
require_once './database/db.php';
class clienteModel
{
    private $db;

    function __construct()
    {
        $this->db = setupDB();
    }
    function getAllClientes()
    {
        $query = $this->db->prepare('SELECT * FROM clientes');
        $query->execute();
        $cliente = $query->fetchAll(PDO::FETCH_OBJ);
        return $cliente;
    }

    function getClienteById($id)
    {
        $query = $this->db->prepare("SELECT * FROM clientes WHERE ID_cliente = ?");
        $query->execute([$id]);
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }
    function getViajesByClienteId($id)
    {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE id_Cliente = ?");
        $query->execute([$id]);
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);
        return $viajes;
    }
    function addCliente($nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion)
    {
        $query = $this->db->prepare('INSERT INTO clientes (Nombre, Apellido, CorreoElectronico, FechaNacimiento, DNI, Direccion) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion]);
        return $this->db->lastInsertId();
    }
    function updateCliente($id, $nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion)
    {

        $query = $this->db->prepare('UPDATE clientes SET Nombre = ?, Apellido = ?, correoElectronico = ?, FechaNacimiento = ?, DNI = ?, direccion = ? WHERE ID_Cliente = ?');
        $query->execute([$nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion, $id]);
    }

    function deleteCliente($id)
    {
        $query = $this->db->prepare('DELETE FROM clientes WHERE ID_Cliente = ?');
        $query->execute([$id]);
    }
}
