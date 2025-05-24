<?php

use App\Controller\{
    AlunoController,
    AutorController,
    CategoriaController,
    InicialController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        InicialController::index();
        break;
    case '/aluno':
        AlunoController::listar();
        break;
    case '/aluno/cadastro':
        AlunoController::cadastro();
        break;
    case '/aluno/delete':
        AlunoController::delete();
        break;
    case '/categoria':
        CategoriaController::listar();
        break;
    case '/categoria/cadastro':
        CategoriaController::cadastro();
        break;
    case '/categoria/delete':
        CategoriaController::delete();
        break;
    case '/autor':
        AutorController::listar();
        break;
    case '/autor/cadastro':
        AutorController::cadastro();
        break;
    case '/autor/delete':
        AutorController::delete();
        break;
    default:
        # code...
        break;
}
