<?php

namespace App\Controller;

use App\Model\Autor;

class AutorController
{
    public static function cadastro() : void
    {
        $model = new Autor();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->id = $_POST['id'] ?? null;
            $model->nome = $_POST['nome'];
            $model->data_nascimento = $_POST['data_nascimento'];
            $model->cpf = $_POST['cpf'];
            $model->save();
            
            header('Location: /autor');
            exit;
        }

        if (isset($_GET['id'])) {
            $autor = $model->getById((int) $_GET['id']);
        }

        include VIEWS . "/Autor/form_autor.php";
    }

    public static function listar() : void
    {
        $autor = new Autor();
        $autores = $autor->getAll();

        include VIEWS . "/Autor/lista_autor.php";
    }

    public static function delete() : void
    {
        $autor = new Autor();
        
        $autor->delete((int) $_GET['id']);

        header('Location: /autor');
    }
}
