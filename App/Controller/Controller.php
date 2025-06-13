<?php

namespace App\Controller;

use App\Model\Model;

abstract class Controller
{
    protected static function render(string $view, ?Model $model) : void
    {
        include VIEWS . $view;
    }

    protected static function isPost() : bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    protected static function redirect(string $route) : void
    {
        header("Location: $route");
        exit;
    }
}
