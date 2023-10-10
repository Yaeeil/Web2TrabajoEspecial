<?php
require_once './database/db.php';

class UsuarioModel
{
    private $db;

    function __construct()
    {
        $this->db = setupDB();
        // $this->db = new PDO('mysql:host=localhost;dbname=web2tpe;charset=utf8', 'root', '');
    }

    public function getByNombre($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE NombreUsuario = ?');
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
