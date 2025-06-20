<?php

namespace App\Controller;

use App\Model\{
    Emprestimo,
    Aluno,
    Livro
};
use Exception;

class EmprestimoController extends Controller
{
    public static function index() : void
    {
        $model = new Emprestimo();

        try {
            $model->getAll();
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao buscar os emprestimos');
            $model->setError($e->getMessage());
        }

        parent::render('/Emprestimo/lista_emprestimo.php', $model);
    }

    public static function cadastro() : void
    {
        $model = new Emprestimo();

        try {
            if (parent::isPost()) {
                $model->id = (int) $_POST['id'] ?? null;
                $model->id_aluno = (int) $_POST['id_aluno'];
                $model->id_livro = (int) $_POST['id_livro'];
                $model->id_usuario = LoginController::getUsuario()->id;
                $model->data_emprestimo = $_POST['data_emprestimo'];
                $model->data_devolucao = $_POST['data_devolucao'];
                $model->save();

                parent::redirect('/emprestimo');
            }
            
            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        $model->rows_alunos = new Aluno()->getAll();
        $model->rows_livros = new Livro()->getAll();

        parent::render('/Emprestimo/form_emprestimo.php', $model);
    }

    public static function delete() : void
    {
        $model = new Emprestimo();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect('/emprestimo');
        } catch (Exception $e) {
            $model->setError('Ocorreu um erro ao excluir o emprestimo');
            $model->setError($e->getMessage());
        }

        parent::render('/Emprestimo/lista_emprestimo.php', $model);
    }
}
