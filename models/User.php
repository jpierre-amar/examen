<?php
// Modèle User - Gère les interactions avec la table des utilisateurs dans la base de données
class User
{
    private $db;
    // Constructeur - Injecte l'instance de connexion à la base de données
    public function __construct(PDO $db)
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
    public function create(string $email, string $password)
    {
        $query = $this->db->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        return $query->execute();
    }

    public function emailExists($email): bool
    {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch() !== false; // Retourne true si un résultat existe
    }

    public function login(string $email, string $password): bool
    {
        // Préparer la requête pour récupérer l'utilisateur par son mail
        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        // Récupéré l'utilisateur
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe
        if (!$user) {
            // L'utilisateur n'existe pas
            $_SESSION['error'] = "Aucun utilisateur trouvé avec cet e-mail.";
            return false;
        }

        // Vérifier le mot de passe
        if (!password_verify($password, $user['password'])) {
            // Mot de passe incorrect
            $_SESSION['error'] = "Mot de passe incorrect.";
            return false;
        }

        // Connexion réussie : stocker les informations utilisateur dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        // Retourner true pour indiquer une connexion réussie
        $_SESSION['success'] = "Connexion réussie !";
        return true;
    }
}
