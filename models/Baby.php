<?php
// Modèle Baby - Gère les interactions avec la table des bébés
class Baby
{
    private PDO $db;

    // Constructeur - Injecte l'instance de connexion à la base de données
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Récupère tous les bébés appartenant à un utilisateur
    public function findAllByUser($userId)
    {
        $query = $this->db->prepare('SELECT * FROM babies WHERE user_id = :user_id');
        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crée un nouveau bébé
    public function create($userId, $name, $birthDate)
    {
        $query = $this->db->prepare('INSERT INTO babies (user_id, name, birth_date) VALUES (:user_id, :name, :birth_date)');
        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':birth_date', $birthDate, PDO::PARAM_STR);
        return $query->execute();
    }

    // Met à jour les informations d'un bébé
    public function update($id, $name, $birthDate)
    {
        $query = $this->db->prepare('UPDATE babies SET name = :name, birth_date = :birth_date WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':birth_date', $birthDate, PDO::PARAM_STR);
        return $query->execute();
    }
}
