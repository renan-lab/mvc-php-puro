<?php

use App\Controller\{
    AlunoController,
    AuthController,
    AutorController,
    CategoriaController,
    InicialController,
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
        AlunoController::listar();
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
        CategoriaController::listar();
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
        AutorController::listar();
        break;
    case '/autor/cadastro':
        AuthController::isAuthenticated();
        AutorController::cadastro();
        break;
    case '/autor/delete':
        AuthController::isAuthenticated();
        AutorController::delete();
        break;
    default:
        # code...
        break;
}
