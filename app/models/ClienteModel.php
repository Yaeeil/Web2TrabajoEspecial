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
    function getViajes($id)
    {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE id_Cliente = ?");
        $query->execute([$id]);
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);
        return $viajes;
    }
}
