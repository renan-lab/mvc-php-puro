<?php

namespace App\Model;

use App\DAO\AutorDAO;
use Exception;

class Autor extends Model
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
    public ?string $data_nascimento
    {
        set
        {
            if (empty($value))
                throw new Exception('Preencha a data de nascimento');

            $this->data_nascimento = $value;
        }

        get => $this->data_nascimento ?? null;
    }
    public ?string $cpf
    {
        set
        {
            if (strlen($value) < 11)
                throw new Exception('O CPF deve ter no mínimo 11 caracteres');

            $this->cpf = $value;
        }

        get => $this->cpf ?? null;
    }

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
        $this->rows = new AutorDAO()->select();

        return $this->rows; 
    }

    public function delete(int $id) : bool
    {
        return new AutorDAO()->delete($id);
    }
}
