<?php

class Controller
{
    protected function view($name, $data = [])
    {
        extract($data);
        require_once "{$name}.php";
    }

    protected function redirect($path)
    {
        header("Location: {$path}");
        exit;
    }
} 