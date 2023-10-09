<?php
require_once './auth/AuthHelper.php';
require_once './app/models/UsuarioModel.php';
require_once './app/views/AuthView.php';

class AuthController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new UsuarioModel();
        $this->view = new AuthView();
    }

    public function showLogin()
    {
        $this->view->showLogin();
    }

    public function auth()
    {
        $nombre = $_POST['nombreUsuario'];
        $password = $_POST['password'];

        if (empty($nombre) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->model->getByNombre($nombre);
        if ($user && password_verify($password, $user->password)) {
            // ACA LO AUTENTIQUE
            AuthHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logOut()
    {
        AuthHelper::logOut();
        header('Location: ' . BASE_URL);
    }
}
