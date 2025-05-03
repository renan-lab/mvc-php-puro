<?php

namespace App\DAO;

use App\Model\Aluno;

class AlunoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Aluno $model) : Aluno
    {
        return empty($model->id) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Aluno $model) : Aluno
    {
        $sql = "INSERT INTO aluno (nome, ra, curso) VALUES (:nome, :ra, :curso)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':nome', $model->nome, parent::PARAM_STR);
        $stmt->bindParam(':ra', $model->ra, parent::PARAM_INT);
        $stmt->bindParam(':curso', $model->curso, parent::PARAM_STR);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Aluno $model) : Aluno
    {
        $sql = "UPDATE aluno SET nome = :nome, ra = :ra, curso = :curso WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':nome', $model->nome, parent::PARAM_STR);
        $stmt->bindParam(':ra', $model->ra, parent::PARAM_INT);
        $stmt->bindParam(':curso', $model->curso, parent::PARAM_STR);
        $stmt->bindParam(':id', $model->id, parent::PARAM_INT);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id) : ?Aluno
    {
        $sql = "SELECT * FROM aluno WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':id', $id, parent::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Aluno");
    }

    public function select() : array
    {
        $sql = "SELECT * FROM aluno";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(parent::FETCH_CLASS, "App\Model\Aluno");
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM aluno WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':id', $id, parent::PARAM_INT);
        
        return $stmt->execute();
    }
}
