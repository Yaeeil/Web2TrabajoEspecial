<?php
require_once './database/db.php';

class UsuarioModel
{
    private $db;

    function __construct()
    {
        $this->db = setupDB();
    }

    public function getByNombre($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
