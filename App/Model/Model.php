<?php

namespace App\Model;

abstract class Model
{
    final public array $rows = [];
    private array $errors = [];

    public function setError(string $msg) : void
    {
        $this->errors[] = $msg;
    }

    public function getErrors() : string
    {
        $msg = "<ul>";

        foreach ($this->errors as $error) {
            $msg .= "<li>$error</li>";
        }

        $msg .= "</ul>";
        
        return $msg;
    }
}
