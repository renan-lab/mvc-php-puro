<?php

namespace App\Model;

use App\DAO\EmprestimoDAO;
use Exception;

class Emprestimo extends Model
{
    public ?int $id = null;
    public ?int $id_usuario = null;
    public ?int $id_livro = null;
    public ?int $id_aluno = null;
    public ?string $data_devolucao = null;
    public ?string $data_emprestimo = null;
    public ?Aluno $dados_aluno = null;
    public ?Livro $dados_livro = null;
    public array $rows_alunos = [];
    public array $rows_livros = [];

    public function save() : Emprestimo
    {
        return new EmprestimoDAO()->save($this);
    }

    public function getById(int $id) : ?Emprestimo
    {
        return new EmprestimoDAO()->selectById($id);
    }

    public function getAll() : array
    {
        $this->rows = new EmprestimoDAO()->select();

        return $this->rows;
    }

    public function delete(int $id) : bool
    {
        return new EmprestimoDAO()->delete($id);
    }
}
