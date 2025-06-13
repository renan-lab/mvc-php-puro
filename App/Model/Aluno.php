<?php

namespace App\Model;

use App\DAO\AlunoDAO;
use Exception;

class Aluno extends Model
{
    public ?int $id = null;
    public ?string $nome
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception('Nome deve ter no mínimo 3 caracteres');

            $this->nome = $value;
        }

        get => $this->nome ?? null;
    }
    public ?int $ra
    {
        set
        {
            if (empty($value))
                throw new Exception('Preencha o RA');

            $this->ra = $value;
        }

        get => $this->ra ?? null;
    }
    public ?string $curso
    {
        set
        {
            if (strlen($value) < 3)
                throw new Exception('Curso deve ter no mínimo 3 caracteres');

            $this->curso = $value;
        }

        get => $this->curso ?? null;
    }

    public function save() : Aluno
    {
        return new AlunoDAO()->save($this);
    }

    public function getById(int $id) : ?Aluno
    {
        return new AlunoDAO()->selectById($id);
    }

    public function getAll() : array
    {
        $this->rows = new AlunoDAO()->select();

        return $this->rows;
    }

    public function delete(int $id) : bool
    {
        return new AlunoDAO()->delete($id);
    }
}
