<?php

namespace App\Model;

use App\DAO\AutorDAO;

class Autor
{
    public $id, $nome, $data_nascimento, $cpf;

    public function save() : Autor
    {
        return new AutorDAO()->save($this);
    }

    public function getById(int $id) : ?Autor
    {
        return new AutorDAO()->selectById($id);
    }

    public function getAll() : array
    {
        return new AutorDAO()->select();
    }

    public function delete(int $id) : bool
    {
        return new AutorDAO()->delete($id);
    }
}
