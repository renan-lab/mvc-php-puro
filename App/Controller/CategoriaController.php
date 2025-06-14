<?php

namespace App\Controller;

use App\Model\Categoria;
use Exception;

class CategoriaController extends Controller
{
    public static function index() : void
    {
        $model = new Categoria();

        try {
            $model->getAll();
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao buscar as categorias');
            $model->setError($e->getMessage());
        }

        parent::render('/Categoria/lista_categoria.php', $model);
    }

    public static function cadastro() : void
    {
        $model = new Categoria();

        try {
            if (parent::isPost()) {
                $model->id = (int) $_POST['id'] ?? null;
                $model->descricao = $_POST['descricao'];

                $model->save();

                parent::redirect('/categoria');
            }

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        parent::render('/Categoria/form_categoria.php', $model);
    }

    public static function delete() : void
    {
        $model = new Categoria();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect('/categoria');
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao excluir a categoria');
            $model->setError($e->getMessage());
        }

        parent::render('/Categoria/lista_categoria.php', $model);
    }
}
