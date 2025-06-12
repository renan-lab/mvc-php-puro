<?php

namespace App\Model;

use App\DAO\LoginDAO;

class Login
{
    public $email, $senha;

    public function logar() : ?Login
    {
        return new LoginDAO()->autenticar($this);
    }
}
