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
        // $queryCliente->bindParam(':idCliente', $id, PDO::PARAM_INT);
        $queryCliente->execute([$id]);
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    function getNombreCliente($id) {
        // // Primero, obtenemos el ID del cliente asociado al viaje
        // $queryIdCliente = $this->db->prepare("SELECT id_Cliente FROM viajes WHERE Id_Viaje = :id");
        // $queryIdCliente->bindParam(':id', $id, PDO::PARAM_INT);
        // $queryIdCliente->execute();

        // // Obtenemos el ID del cliente
        // $idCliente = $queryIdCliente->fetch(PDO::FETCH_COLUMN);

        // Luego, obtenemos el nombre y apellido del cliente correspondiente al ID
        $queryCliente = $this->db->prepare("SELECT Nombre, Apellido, id_Cliente FROM clientes WHERE id_Cliente = :idCliente");
        $queryCliente->bindParam(':idCliente', $id, PDO::PARAM_INT);
        $queryCliente->execute();
    
        // Retorna el cliente asociado al viaje
        $cliente = $queryCliente->fetch(PDO::FETCH_OBJ);
    
    // foreach($viajes as $viaje){ este lo probe y no anda usandolo en la linea 49
         $query = $this->db->prepare('SELECT Nombre, Apellido, ID_Cliente FROM clientes WHERE ID_Cliente= ?');
         $query->execute([$viajes->id_Cliente]);
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
        
       
    }
    
    

    //problema me muestra los detalles en algunos mal
    //a partir del 5 uno atrasado me muestra (los links)
    //problema con los id? 
    function getDetails($id){
        $query = $this->db->prepare("SELECT * FROM viajes WHERE ID_Viaje = ?");
        $query->execute([$id]);
        $viaje = $query->fetch(PDO::FETCH_OBJ);
    
        return $viaje;
    }
    
}