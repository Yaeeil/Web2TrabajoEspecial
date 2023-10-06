<?php
require_once './help/SesionHelper.php';
require_once './app/models/UsuarioModel.php';
require_once './app/views/SesionView.php';
class SesionController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new SesionView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function auth() {
        $nombre= $_POST['nombreUsuario'];
        $password = $_POST['password'];

        if (empty($nombre) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->model->getByNombre($nombre);
        if ($user && password_verify($password, $user->password)) {
            // ACA LO AUTENTIQUE
            
            SesionHelper::login($user);
            
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout() {
        SesionHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}