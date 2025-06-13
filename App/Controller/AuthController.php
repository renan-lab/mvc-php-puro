<?php

namespace App\Controller;

class AuthController
{
    public static function isAuthenticated() : void
    {
        if (!isset($_SESSION['usuario_logado'])) {
            header('Location: /login');
            exit;
        }
    }
}
