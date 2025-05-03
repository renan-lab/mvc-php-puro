<?php

spl_autoload_register(function ($classe) 
{
    $arquivo = BASE_DIR . "/" . $classe . ".php";

    if (!file_exists($arquivo)) {
        throw new Exception("Arquivo não encontrado");
    }

    include $arquivo;
});
