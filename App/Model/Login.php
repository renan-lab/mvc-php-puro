<?php

namespace App\Model;

use App\DAO\LoginDAO;

class Login extends Model
{
    public $id, $email, $senha, $nome;

    public function logar() : ?Login
    {
        return new LoginDAO()->autenticar($this);
    }
}
