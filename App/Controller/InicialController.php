<?php

namespace App\Controller;

class InicialController
{
    public static function index() : void
    {
        include VIEWS . "/Inicial/home.php";
    }
}
