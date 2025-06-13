<?php

namespace App\DAO;

use App\Model\Autor;

class AutorDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Autor $model) : Autor
    {
        return empty($model->id) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Autor $model) : Autor
    {
        $sql = "INSERT INTO autor (nome, data_nascimento, cpf) VALUES (:nome, :data_nascimento, :cpf)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':nome', $model->nome, parent::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $model->data_nascimento, parent::PARAM_STR);
        $stmt->bindValue(':cpf', $model->cpf, parent::PARAM_STR);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Autor $model) : Autor
    {
        $sql = "UPDATE autor SET nome = :nome, data_nascimento = :data_nascimento, cpf = :cpf WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':nome', $model->nome, parent::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $model->data_nascimento, parent::PARAM_STR);
        $stmt->bindValue(':cpf', $model->cpf, parent::PARAM_STR);
        $stmt->bindValue(':id', $model->id, parent::PARAM_INT);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id) : ?Autor
    {
        $sql = "SELECT * FROM autor WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $id, parent::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject('App\Model\Autor');
    }

    public function select() : array
    {
        $sql = "SELECT * FROM autor";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(parent::FETCH_CLASS, 'App\Model\Autor');
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM autor WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $id, parent::PARAM_INT);
        
        return $stmt->execute();
    }
}
