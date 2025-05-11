<?php

namespace App\Controller;

use App\Model\Aluno;

class AlunoController
{
    public static function cadastro() : void
    {
        $model = new Aluno();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->id = $_POST['id'] ?? null;
            $model->nome = $_POST['nome'];
            $model->ra = $_POST['ra'];
            $model->curso = $_POST['curso'];
            $model->save();

            header('Location: /aluno');
            exit;
        }
        
        if (isset($_GET['id'])) {
            $aluno = $model->getById((int) $_GET['id']);
        }

        include VIEWS . "/Aluno/form_aluno.php";
    }

    public static function listar() : void
    {
        $aluno = new Aluno();
        $alunos = $aluno->getAll();
        
        include VIEWS . "/Aluno/lista_aluno.php";
    }

    public static function delete() : void
    {
        $aluno = new Aluno();

        $aluno->delete((int) $_GET['id']);

        header('Location: /aluno');
    }
}
