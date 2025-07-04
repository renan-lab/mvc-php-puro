<?php

namespace App\Controller;

use App\Model\{
    Livro,
    Categoria,
    Autor
};
use Exception;

class LivroController extends Controller
{
    public static function index() : void
    {
        $model = new Livro();

        try {
            $model->getAll();
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao buscar os livros');
            $model->setError($e->getMessage());
        }

        parent::render('/Livro/lista_livro.php', $model);
    }


    public static function cadastro() : void
    {
        $model = new Livro;

        try {
            if (parent::isPost()) {
                $model->id = (int) $_POST['id'] ?? null;
                $model->titulo = $_POST['titulo'];
                $model->id_categoria = $_POST['id_categoria'];
                $model->editora = $_POST['editora'];
                $model->ano = $_POST['ano'];
                $model->isbn = $_POST['isbn'];
                $model->id_autores = $_POST['autor'];

                $model->save();

                parent::redirect('/livro');
            }

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        $model->rows_categorias = new Categoria()->getAll();

        $model->rows_autores = new Autor()->getAll();

        parent::render('/Livro/form_livro.php', $model);
    }

    public static function delete() : void
    {
        $model = new Livro();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect('/livro');
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao excluir o livro');
            $model->setError($e->getMessage());
        }

        parent::render('/Livro/lista_livro.php', $model);
    }
}
