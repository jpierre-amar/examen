<?php

namespace App\Controllers;

class Controller
{
    protected function view($name, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../views/{$name}.php";
    }

    protected function redirect($path)
    {
        header("Location: {$path}");
        exit;
    }
} 