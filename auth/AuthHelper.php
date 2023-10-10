<?php

class AuthHelper
{

    public static function init()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user)
    {
            AuthHelper::init();
            $_SESSION['id_usuario'] = $user->id_usuario;
            $_SESSION['nombreUsuario'] = $user->NombreUsuario;
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
                AuthHelper::logout(); 
            }
            $_SESSION['LAST_ACTIVITY'] = time();
        }
        

    public static function logOut()
    {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify()
    {
        AuthHelper::init();
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ' . BASE_URL);
            die();
        }
    }
}
