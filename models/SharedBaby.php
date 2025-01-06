<?php
// Classe SharedBaby pour gérer le partage d'accès aux bébés entre utilisateurs
class SharedBaby {
    private $db;

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct($db) {
        $this->db = $db;
    }

    // Méthode pour partager un bébé avec un autre utilisateur
    public function share($data) {
        $sql = "INSERT INTO shared_babies (baby_id, user_id, permissions) VALUES (:baby_id, :user_id, :permissions)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'baby_id' => $data['baby_id'],
            'user_id' => $data['user_id'],
            'permissions' => $data['permissions']
        ]);
        return $this->db->lastInsertId();
    }

    // Méthode pour récupérer les utilisateurs ayant accès à un bébé
    public function getSharedUsers($babyId) {
        $sql = "SELECT * FROM shared_babies WHERE baby_id = :baby_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['baby_id' => $babyId]);
        return $stmt->fetchAll();
    }
}