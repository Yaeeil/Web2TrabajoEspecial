<?php

require_once './app/views/HomeView.php';
//require_once './auth/AuthHelper.php';

class HomeController{
    private $view;

    public function __construct() {
        //AuthHelper::verify();
        $this->view = new HomeView();
        
    }

    public function showHome() {
        $this->view->showHome();
    }

    
}