<?php

require_once './app/views/HomeView.php';

class HomeController
{
    private $view;
    public function __construct()
    {
        $this->view = new HomeView();
    }
    public function showHome()
    {
        $isAdmin = AuthHelper::isAdmin();
        $this->view->showHome($isAdmin);
    }
}
