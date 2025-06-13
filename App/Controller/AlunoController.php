<?php

namespace App\Controller;

use App\Model\Aluno;
use Exception;

class AlunoController extends Controller
{
    public static function index() : void
    {
        $model = new Aluno();

        try {
            $model->getAll();
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao buscar os alunos');
            $model->setError($e->getMessage());
        }

        parent::render('/Aluno/lista_aluno.php', $model);
    }

    public static function cadastro() : void
    {
        $model = new Aluno();

        try {
            if (parent::isPost()) {
                $model->id = (int) $_POST['id'] ?? null;
                $model->nome = $_POST['nome'];
                $model->ra = (int) $_POST['ra'];
                $model->curso = $_POST['curso'];
                $model->save();

                parent::redirect('/aluno');
            }
            
            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        parent::render('/Aluno/form_aluno.php', $model);
    }

    public static function delete() : void
    {
        $model = new Aluno();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect('/aluno');
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao excluir o aluno');
            $model->setError($e->getMessage());
        }

        parent::render('/Aluno/lista_aluno.php', $model);
    }
}
