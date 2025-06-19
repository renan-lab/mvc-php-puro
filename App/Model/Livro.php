<?php

namespace App\Model;

use App\DAO\LivroDAO;
use Exception;

class Livro extends Model
{
    public ?int $id = null;
    public array $rows_categorias = [];
    public array $rows_autores = [];
    public $id_categoria;
    public $id_autores;
    public ?string $titulo
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception('O título deve ter no mínimo 3 caracteres');

            $this->titulo = $value;
        }

        get => $this->titulo ?? null;
    }
    public ?string $editora
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception('Editora deve ter no mínimo 3 caracteres');
            
            $this->editora = $value;
        }

        get => $this->editora ?? null;
    }
    public ?string $isbn
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception('ISBN deve ter no mínimo 3 caracteres');

            $this->isbn = $value;
        }

        get => $this->isbn ?? null;
    }
    public ?string $ano
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception('Ano deve ter no mínimo 3 caracteres');

            $this->ano = $value;
        }

        get => $this->ano ?? null;
    }

    public function save() : Livro
    {
        return new LivroDAO()->save($this);
    }

    public function getById(int $id) : ?Livro
    {
        return new LivroDAO()->selectById($id);
    }

    public function getAll() : array
    {
        $this->rows = new LivroDAO()->select();

        return $this->rows;
    }

    public function delete(int $id) : bool
    {
        return new LivroDAO()->delete($id);
    }
}
