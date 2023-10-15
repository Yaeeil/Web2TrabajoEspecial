<?php
<<<<<<< HEAD
require_once './app/models/Model.php';

class UsuarioModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }
=======
require_once 'Model.php';

class UsuarioModel extends Model
{
  
>>>>>>> 7f5f8128820944f75a468cef542a9b6bf2863132

    public function getByNombre($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
