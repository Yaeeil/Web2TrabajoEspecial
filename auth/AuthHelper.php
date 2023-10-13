<?php

class AuthHelper
{

    public static function init()
    {
        session_start();
    }

    public static function login($user)
    {
        $_SESSION['id_usuario'] = $user->id_usuario;
        $_SESSION['nombre_usuario'] = $user->NombreUsuario;

        $_SESSION['LAST_ACTIVITY'] = time();
    }
    public static function isAdmin()
    {
        return !empty($_SESSION['id_usuario']);
    }


    public static function logOut()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
        die();
    }

    public static function verify()
    {
        if (!isset($_SESSION['id_usuario'])) {
            AuthHelper::logOut();
        }
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            AuthHelper::logout();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}
