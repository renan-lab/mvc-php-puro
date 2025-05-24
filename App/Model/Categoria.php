<?php

namespace App\Model;

use App\DAO\CategoriaDAO;

class Categoria
{
    public $id, $descricao;

    public function save() : Categoria
    {
        return new CategoriaDAO()->save($this);
    }

    public function getById(int $id) : ?Categoria
    {
        return new CategoriaDAO()->selectById($id);
    }

    public function getAll() : array
    {
        return new CategoriaDAO()->select();
    }

    public function delete(int $id) : bool
    {
        return new CategoriaDAO()->delete($id);
    }
}
