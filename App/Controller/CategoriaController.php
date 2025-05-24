<?php

namespace App\Controller;

use App\Model\Categoria;

class CategoriaController
{
    public static function cadastro() : void
    {
        $model = new Categoria();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->id = $_POST['id'] ?? null;
            $model->descricao = $_POST['descricao'];

            $model->save();

            header('Location: /categoria');
            exit;
        }

        if (isset($_GET['id'])) {
            $categoria = $model->getById((int) $_GET['id']);
        }

        include VIEWS . "/Categoria/form_categoria.php";
    }

    public static function listar() : void
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        include VIEWS . "/Categoria/lista_categoria.php";
    }

    public static function delete() : void
    {
        $categoria = new Categoria();

        $categoria->delete((int) $_GET['id']);

        header('Location: /categoria');
    }
}
