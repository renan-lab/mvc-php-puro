<?php

namespace App\DAO;

use App\Model\Aluno;
use App\Model\Emprestimo;
use App\Model\Livro;

class EmprestimoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Emprestimo $model) : Emprestimo
    {
        return empty($model->id) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Emprestimo $model) : Emprestimo
    {
        $sql = "INSERT INTO emprestimo (id_usuario, id_aluno, id_livro, data_emprestimo, data_devolucao) VALUES (:id_usuario, :id_aluno, :id_livro, :data_emprestimo, :data_devolucao)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_usuario', $model->id_usuario, parent::PARAM_INT);
        $stmt->bindValue(':id_aluno', $model->id_aluno, parent::PARAM_INT);
        $stmt->bindValue(':id_livro', $model->id_livro, parent::PARAM_INT);
        $stmt->bindValue(':data_emprestimo', $model->data_emprestimo, parent::PARAM_STR);
        $stmt->bindValue(':data_devolucao', $model->data_devolucao, parent::PARAM_STR);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Emprestimo $model) : Emprestimo
    {
        $sql = "UPDATE emprestimo SET id_usuario = :id_usuario, id_aluno = :id_aluno, id_livro = :id_livro, data_emprestimo = :data_emprestimo, data_devolucao = :data_devolucao WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_usuario', $model->id_usuario, parent::PARAM_INT);
        $stmt->bindValue(':id_aluno', $model->id_aluno, parent::PARAM_INT);
        $stmt->bindValue(':id_livro', $model->id_livro, parent::PARAM_INT);
        $stmt->bindValue(':data_emprestimo', $model->data_emprestimo, parent::PARAM_STR);
        $stmt->bindValue(':data_devolucao', $model->data_devolucao, parent::PARAM_STR);
        $stmt->bindValue(':id', $model->id, parent::PARAM_INT);

        return $model;
    }

    public function selectById(int $id) : ?Emprestimo
    {
        $sql = "SELECT * FROM emprestimo WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $id, parent::PARAM_INT);
        $stmt->execute();

        $model = $stmt->fetchObject("App\Model\Emprestimo");

        $model->dados_aluno = new Aluno()->getById($model->id_aluno);
        $model->dados_livro = new Livro()->getById($model->id_livro);

        return $model;
    }

    public function select() : array
    {
        $sql = "SELECT * FROM emprestimo";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        $emprestimos = $stmt->fetchAll(parent::FETCH_CLASS, "App\Model\Emprestimo");

        foreach ($emprestimos as $emprestimo) {
            $emprestimo->dados_aluno = new Aluno()->getById($emprestimo->id_aluno);
            $emprestimo->dados_livro = new Livro()->getById($emprestimo->id_livro);
        }

        return $emprestimos;
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM emprestimo WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $id, parent::PARAM_INT);
        
        return $stmt->execute();
    }
}
