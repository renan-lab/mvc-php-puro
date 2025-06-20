<?php

namespace App\Controller;

use App\Model\Login;

class LoginController extends Controller
{
    public static function index() : void
    {
        $model = new Login();

        if (parent::isPost()) {
            $model->email = $_POST['email'];
            $model->senha = $_POST['senha'];
            
            $model = $model->logar();

            if (!is_null($model)) {
                $_SESSION['usuario_logado'] = $model;

                if (isset($_POST['lembrar'])) {
                    setcookie(
                        name: 'sistema_biblioteca_usuario', 
                        value: $model->email, 
                        expires_or_options: time() + 60 * 60 * 24 * 30
                    );
                }

                parent::redirect('/');
            }
            
            $model->setError('Email ou senha incorretos');
        }

        if (isset($_COOKIE['sistema_biblioteca_usuario'])) {
            $model->email = $_COOKIE['sistema_biblioteca_usuario'];
        }
        
        parent::render('/Login/form_login.php', $model);
    }

    public static function logout() : void 
    {
        session_destroy();
        parent::redirect('/login');
    }

    public static function getUsuario() : Login
    {
        return unserialize(serialize($_SESSION['usuario_logado']));
    }
}
