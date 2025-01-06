<?php
// Modèle User - Gère les interactions avec la table des utilisateurs dans la base de données
class User
{
    private $db;

    // Constructeur - Injecte l'instance de connexion à la base de données
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Récupère un utilisateur par email
    public function findByEmail($email)
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Crée un nouvel utilisateur
    public function create($name, $email, $password)
    {
        $query = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        return $query->execute();
    }
}
