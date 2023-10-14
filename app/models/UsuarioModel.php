<?php
require_once './models/Model.php';

class UsuarioModel extends Model
{
    private $db;

    function __construct()
    {
        parent::__construct();
    }

    public function getByNombre($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
