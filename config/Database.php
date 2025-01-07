<?php

class Database
{
    public static function getConnection(): PDO
    {
        try {
            // Utilisez 127.0.0.1 au lieu de localhost pour éviter le problème du socket
            $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=examen', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo; // Retourner l'instance PDO
        } catch (PDOException $e) {
            throw new Exception('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}