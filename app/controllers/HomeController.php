<?php

require_once './app/views/HomeView.php';
require_once './app/controllers/BaseController.php';

class HomeController extends BaseController {
    private $view;

    public function __construct() {
        parent::__construct();
        $this->view = new HomeView();
        
    }

    public function showHome() {
        $this->view->showHome();
    }

    
}