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


   function getInfoCliente($idCliente) {
     //siempre queda en el cliente con id 1
      $query = $this->db->prepare('SELECT * FROM viajes');
      $query->execute();
       $viajes = $query->fetch(PDO::FETCH_OBJ);
    
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