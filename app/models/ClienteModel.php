<?php
<<<<<<< HEAD
require_once './app/models/Model.php';
=======
require_once 'Model.php';
>>>>>>> 7f5f8128820944f75a468cef542a9b6bf2863132
class clienteModel extends Model
{

    
    function getAllClientes()
    {
        $query = $this->db->prepare('SELECT * FROM clientes');
        $query->execute();
        $cliente = $query->fetchAll(PDO::FETCH_OBJ);
        return $cliente;
    }

    function getClienteById($id)
    {
        $query = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $query->execute([$id]);
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }



    function addCliente($nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion)
    {
        $query = $this->db->prepare('INSERT INTO clientes (nombre, apellido, correo_electronico, fecha_nacimiento, dni, direccion) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion]);
        return $this->db->lastInsertId();
    }
    function updateCliente($id, $nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion)
    {

        $query = $this->db->prepare('UPDATE clientes SET nombre = ?, apellido = ?, correo_electronico = ?, fecha_nacimiento = ?, dni = ?, direccion = ? WHERE id_cliente = ?');
        $query->execute([$nombre, $apellido, $correoElectronico, $fechaDeNacimiento, $dni, $direccion, $id]);
    }

    function deleteCliente($id)
    {
        $query = $this->db->prepare('DELETE FROM clientes WHERE id_cliente = ?');
        $query->execute([$id]);
    }
}
