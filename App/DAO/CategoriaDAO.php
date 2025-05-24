<?php

namespace App\DAO;

use App\Model\Categoria;

class CategoriaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Categoria $model) : Categoria
    {
        return empty($model->id) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Categoria $model) : Categoria
    {
        $sql = "INSERT INTO categoria (descricao) VALUES (:descricao)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':descricao', $model->descricao, parent::PARAM_STR);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Categoria $model) : Categoria
    {
        $sql = "UPDATE categoria SET descricao = :descricao WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':descricao', $model->descricao, parent::PARAM_STR);
        $stmt->bindParam(':id', $model->id, parent::PARAM_INT);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id) : ?Categoria
    {
        $sql = "SELECT * FROM categoria WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':id', $id, parent::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject('App\Model\Categoria');
    }

    public function select() : array
    {
        $sql = "SELECT * FROM categoria";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(parent::FETCH_CLASS, 'App\Model\Categoria');
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM categoria WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindParam(':id', $id, parent::PARAM_INT);

        return $stmt->execute();
    }
}
