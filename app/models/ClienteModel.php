<?php
require_once './database/db.php';
class clienteModel
{
    private $db;

    function __construct()
    {
        // $this->db = new PDO('mysql:host=localhost;dbname=web2tpe;charset=utf8', 'root', '');
        $this->db = setupDB();
    }
    //cambiale el nombre xq no es viajes pero solo hace este 
    function getAllClientes()
    {
        $query = $this->db->prepare('SELECT * FROM clientes');
        $query->execute();
        $cliente = $query->fetchAll(PDO::FETCH_OBJ);
        return $cliente;
    }

    //este noo sea si pero seria de viajes bro
    function getDetails($id)
    {
        $query = $this->db->prepare("SELECT * FROM clientes WHERE ID_cliente = ?");
        // $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute([$id]);

        // $cliente es un objeto con los detalles del cliente
        $cliente = $query->fetch(PDO::FETCH_OBJ);

        return $cliente;
    }
    function getClientes($id)
    {
        $query = $this->db->prepare("SELECT * FROM clientes WHERE ID_Cliente = ?");
        $query->execute([$id]);
        $clientes = $query->fetchAll(PDO::FETCH_OBJ);
        return $clientes;
    }
    function addCliente($nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion)
    {
        $query = $this->db->prepare('INSERT INTO clientes (Nombre, Apellido, CorreoElectronico, FechaNacimiento, DNI, Direccion) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion]);
        return $this->db->lastInsertId();
    }
    function updateCliente($nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion)
    {
        $query = $this->db->prepare('UPDATE clientes SET Nombre = ?, Apellido = ?, correoElectronico = ?, FechaNacimiento = ?, DNI = ?, direccion = ? WHERE ID_Cliente = ?');
        $query->execute([$nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion]);
    }
    
    function deleteCliente($id)
    {
        $query = $this->db->prepare('DELETE FROM clientes WHERE ID_Cliente = ?');
        $query->execute([$id]);
    }
}
