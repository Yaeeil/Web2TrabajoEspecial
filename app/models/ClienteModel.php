<?php
class clienteModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=web2tpe;charset=utf8', 'root', '');
    }
    //cambiale el nombre xq no es viajes pero solo hace este 
    function getAllClientes() {
        $query = $this->db->prepare('SELECT * FROM clientes');
        $query->execute();


        $viaje = $query->fetchAll(PDO::FETCH_OBJ);

        return $viaje;
    }

    /*
//este no
    function getCliente() {
        $query = $this->db->prepare('SELECT nombre FROM clientes');
        $query->execute();


        $cliente = $query->fetchAll(PDO::FETCH_OBJ);

        return $cliente;
    }
//este no
    function getIdviaje() {
        $query = $this->db->prepare("SELECT ID_Cliente FROM clientes");
        $query->execute();


        $viaje = $query->fetchAll(PDO::FETCH_OBJ);

        return $viaje;
    }

    //este no
    function getIdCliente($id) {
        $query = $this->db->prepare('SELECT id_Cliente FROM clientes WHERE ID_cliente= :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();


        $cliente = $query->fetchAll(PDO::FETCH_OBJ);

        return $cliente;
    }

//este no

    function getNombreCliente($id) {
        // Primero, obtenemos el ID del cliente asociado al cliente
        $queryIdCliente = $this->db->prepare("SELECT id_Cliente FROM clientes WHERE Id_cliente = :id");
        $queryIdCliente->bindParam(':id', $id, PDO::PARAM_INT);
        $queryIdCliente->execute();
    
        // Obtenemos el ID del cliente
        $idCliente = $queryIdCliente->fetch(PDO::FETCH_COLUMN);
    
        // Luego, obtenemos el nombre y apellido del cliente correspondiente al ID
        $queryCliente = $this->db->prepare("SELECT Nombre, Apellido, ID_Cliente FROM clientes WHERE ID_Cliente = :idCliente");
        $queryCliente->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
        $queryCliente->execute();
    
        // Retorna el cliente asociado al cliente
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
    
        return $cliente;
    }
    
    
//este no

//o sea si pero seria de viajes bro
*/
function getDetails($id){
        $query = $this->db->prepare("SELECT * FROM clientes WHERE ID_cliente = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    
        // $cliente es un objeto con los detalles del cliente
        $cliente = $query->fetch(PDO::FETCH_OBJ);
    
        return $cliente;
    }
    
}