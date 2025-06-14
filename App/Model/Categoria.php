<?php

namespace App\Model;

use App\DAO\CategoriaDAO;
use Exception;

class Categoria extends Model
{
    public ?int $id = null;
    public ?string $descricao
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception('A descrição não deve ter menos que 3 caracteres');

            $this->descricao = $value ?? null;
        }

        get => $this->descricao ?? null;
    }

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
        $this->rows = new CategoriaDAO()->select();

        return $this->rows;
    }

    public function delete(int $id) : bool
    {
        return new CategoriaDAO()->delete($id);
    }
}
