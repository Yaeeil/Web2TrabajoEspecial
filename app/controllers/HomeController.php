<?php

require_once './app/views/HomeView.php';

class HomeController {
    private $view;

    public function __construct() {
        $this->view = new HomeView();
        
    }

    public function showHome() {
        $this->view->showHome();
    }

    
}