<?php

class HomeView
{
    public function showHome($isAdmin=false)
    {
        require_once "templates/Home.phtml";
    }
}
