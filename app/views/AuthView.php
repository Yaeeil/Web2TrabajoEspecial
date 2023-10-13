<?php
class AuthView
{
    public function showLogin($error = null, $isAdmin=false)
    {
        require './templates/LogIn.phtml';
    }
}
