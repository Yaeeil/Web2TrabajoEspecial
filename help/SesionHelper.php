<?php

class SesionHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        SesionHelper::init();
        $_SESSION['id_usuario'] = $user->id_usuario;
        $_SESSION['nombreUsuario'] = $user->NombreUsuario; 
    }

    public static function logout() {
        SesionHelper::init();
        session_destroy();
    }

    public static function verify() {
        SesionHelper::init();
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ' . BASE_URL . '/logIn');
            die();
        }
    }
}