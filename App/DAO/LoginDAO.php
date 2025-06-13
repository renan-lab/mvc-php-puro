<?php

namespace App\DAO;

use App\Model\Login;

class LoginDAO extends DAO
{
    public function autenticar(Login $model) : ?Login
    {
        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = SHA1(:senha)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':email', $model->email, parent::PARAM_STR);
        $stmt->bindValue(':senha', $model->senha, parent::PARAM_STR);
        $stmt->execute();

        $model = $stmt->fetchObject('App\Model\Login');

        return is_object($model) ? $model : null;
    }
}
