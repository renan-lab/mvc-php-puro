<?php

namespace App\Controller;

use App\Model\Autor;
use Exception;

class AutorController extends Controller
{
    public static function index() : void
    {
        $model = new Autor();

        try {
            $model->getAll();
        } catch (Exception $e) {
            $model->setError('Erro ao buscar os autores');
            $model->setError($e->getMessage());
        }

        parent::render('/Autor/lista_autor.php', $model);
    }

    public static function cadastro() : void
    {
        $model = new Autor();

        try {
            if (parent::isPost()) {
                $model->id = (int) $_POST['id'] ?? null;
                $model->nome = $_POST['nome'];
                $model->data_nascimento = $_POST['data_nascimento'];
                $model->cpf = $_POST['cpf'];
                $model->save();
                
                parent::redirect('/autor');
            }

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        parent::render('/Autor/form_autor.php', $model);
    }

    public static function delete() : void
    {
        $model = new Autor();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect('/autor');
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao excluir o autor');
            $model->setError($e->getMessage());
        }

        parent::render('/Autor/lista_autor.php', $model);
    }
}
