<?php

class Database
{
    public static function getConnection(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=examen', 'root', 'root');
    }
}