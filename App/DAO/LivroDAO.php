<?php

namespace App\DAO;

use App\Model\Livro;

class LivroDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Livro $model) : Livro
    {
        return empty($model->id) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Livro $model) : Livro
    {
        $sql = "INSERT INTO livro (id_categoria, titulo, editora, ano, isbn) VALUES (:id_categoria, :titulo, :editora, :ano, :isbn)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_categoria', $model->id_categoria, parent::PARAM_INT);
        $stmt->bindValue(':titulo', $model->titulo, parent::PARAM_STR);
        $stmt->bindValue(':editora', $model->editora, parent::PARAM_STR);
        $stmt->bindValue(':ano', $model->ano, parent::PARAM_STR);
        $stmt->bindValue(':isbn', $model->isbn, parent::PARAM_STR);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Livro $model) : Livro
    {
        $sql = "UPDATE livro SET id_categoria = :id_categoria, titulo = :titulo, editora = :editora, ano = :ano, isbn = :isbn WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_categoria', $model->id_categoria, parent::PARAM_STR);
        $stmt->bindValue(':titulo', $model->titulo, parent::PARAM_STR);
        $stmt->bindValue(':editora', $model->editora, parent::PARAM_STR);
        $stmt->bindValue(':ano', $model->ano, parent::PARAM_STR);
        $stmt->bindValue(':isbn', $model->isbn, parent::PARAM_STR);
        $stmt->bindValue(':id', $model->id, parent::PARAM_INT);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id) : ?Livro
    {
        $sql = "SELECT * FROM livro WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $id, parent::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject('App\Model\Livro');
    }

    public function select() : array
    {
        $sql = "SELECT * FROM livro";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(parent::FETCH_CLASS, 'App\Model\Livro');
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM livro WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $id, parent::PARAM_INT);

        return $stmt->execute();
    }
}
