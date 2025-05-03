<?php

namespace App\Controller;

use App\Model\Aluno;

class AlunoController
{
    public static function cadastro()
    {
        $model = new Aluno();
        
        $model->nome = 'Teste';
        $model->ra = 123456;
        $model->curso = 'Sistemas para Internet';
        
        $model_saved = $model->save();

        var_dump($model_saved);
    }

    public static function listar()
    {
        echo 'listagem de alunos';
        $aluno = new Aluno();
        $aluno->getAll();
    }
}
