<?php
require_once 'Model.php';

class UsuarioModel extends Model
{
  

    public function getByNombre($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
