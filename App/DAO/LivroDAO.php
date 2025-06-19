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
        parent::$conexao->beginTransaction();

        $sql = "INSERT INTO livro (id_categoria, titulo, editora, ano, isbn) VALUES (:id_categoria, :titulo, :editora, :ano, :isbn)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_categoria', $model->id_categoria, parent::PARAM_INT);
        $stmt->bindValue(':titulo', $model->titulo, parent::PARAM_STR);
        $stmt->bindValue(':editora', $model->editora, parent::PARAM_STR);
        $stmt->bindValue(':ano', $model->ano, parent::PARAM_STR);
        $stmt->bindValue(':isbn', $model->isbn, parent::PARAM_STR);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        foreach ($model->id_autores as $id_autor) {
            $sql = "INSERT INTO livro_autor_assoc (id_livro, id_autor) VALUES (:id_livro, :id_autor)";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(':id_livro', $model->id, parent::PARAM_INT);
            $stmt->bindValue(':id_autor', $id_autor, parent::PARAM_INT);
            $stmt->execute();
        }

        parent::$conexao->commit();

        return $model;
    }

    public function update(Livro $model) : Livro
    {
        parent::$conexao->beginTransaction();

        $sql = "UPDATE livro SET id_categoria = :id_categoria, titulo = :titulo, editora = :editora, ano = :ano, isbn = :isbn WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_categoria', $model->id_categoria, parent::PARAM_STR);
        $stmt->bindValue(':titulo', $model->titulo, parent::PARAM_STR);
        $stmt->bindValue(':editora', $model->editora, parent::PARAM_STR);
        $stmt->bindValue(':ano', $model->ano, parent::PARAM_STR);
        $stmt->bindValue(':isbn', $model->isbn, parent::PARAM_STR);
        $stmt->bindValue(':id', $model->id, parent::PARAM_INT);
        $stmt->execute();

        $sql = "DELETE FROM livro_autor_assoc WHERE id_livro = :id_livro";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_livro', $model->id, parent::PARAM_INT);
        $stmt->execute();

        foreach ($model->id_autores as $id_autor) {
            $sql = "INSERT INTO livro_autor_assoc (id_livro, id_autor) VALUES (:id_livro, :id_autor)";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(':id_livro', $model->id, parent::PARAM_INT);
            $stmt->bindValue(':id_autor', $id_autor, parent::PARAM_INT);
            $stmt->execute();
        }

        parent::$conexao->commit();

        return $model;
    }

    public function selectById(int $id) : ?Livro
    {
        $sql = "SELECT * FROM livro WHERE id = :id";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $id, parent::PARAM_INT);
        $stmt->execute();

        $model = $stmt->fetchObject('App\Model\Livro');

        $sql = "SELECT id_autor FROM livro_autor_assoc WHERE id_livro = :id_livro";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id_livro', $id, parent::PARAM_INT);
        $stmt->execute();
        
        $model->id_autores = $stmt->fetchAll(parent::FETCH_COLUMN);

        return $model;
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
