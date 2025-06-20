<?php

use App\Controller\{
    AlunoController,
    AuthController,
    AutorController,
    CategoriaController,
    EmprestimoController,
    InicialController,
    LivroController,
    LoginController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        AuthController::isAuthenticated();
        InicialController::index();
        break;
    case '/login':
        LoginController::index();
        break;
    case '/logout':
        LoginController::logout();
        break;
    case '/aluno':
        AuthController::isAuthenticated();
        AlunoController::index();
        break;
    case '/aluno/cadastro':
        AuthController::isAuthenticated();
        AlunoController::cadastro();
        break;
    case '/aluno/delete':
        AuthController::isAuthenticated();
        AlunoController::delete();
        break;
    case '/categoria':
        AuthController::isAuthenticated();
        CategoriaController::index();
        break;
    case '/categoria/cadastro':
        AuthController::isAuthenticated();
        CategoriaController::cadastro();
        break;
    case '/categoria/delete':
        AuthController::isAuthenticated();
        CategoriaController::delete();
        break;
    case '/autor':
        AuthController::isAuthenticated();
        AutorController::index();
        break;
    case '/autor/cadastro':
        AuthController::isAuthenticated();
        AutorController::cadastro();
        break;
    case '/autor/delete':
        AuthController::isAuthenticated();
        AutorController::delete();
        break;
    case '/livro':
        AuthController::isAuthenticated();
        LivroController::index();
        break;
    case '/livro/cadastro':
        AuthController::isAuthenticated();
        LivroController::cadastro();
        break;
    case '/livro/delete':
        AuthController::isAuthenticated();
        LivroController::delete();
        break;
    case '/emprestimo':
        AuthController::isAuthenticated();
        EmprestimoController::index();
        break;
    case '/emprestimo/cadastro':
        AuthController::isAuthenticated();
        EmprestimoController::cadastro();
        break;
    case '/emprestimo/delete':
        AuthController::isAuthenticated();
        EmprestimoController::delete();
    default:
        # code...
        break;
}
