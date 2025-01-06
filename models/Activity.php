<?php
// Modèle Activity - Gère les interactions avec la table des activités
class Activity
{
    private $db;

    // Constructeur - Injecte l'instance de connexion à la base de données
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Récupère toutes les activités associées à un bébé
    public function findAllByBaby($babyId)
    {
        $query = $this->db->prepare('SELECT * FROM activities WHERE baby_id = :baby_id ORDER BY date DESC');
        $query->bindParam(':baby_id', $babyId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crée une nouvelle activité
    public function create($babyId, $type, $date, $notes = null)
    {
        $query = $this->db->prepare('INSERT INTO activities (baby_id, type, date, notes) VALUES (:baby_id, :type, :date, :notes)');
        $query->bindParam(':baby_id', $babyId, PDO::PARAM_INT);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':notes', $notes, PDO::PARAM_STR);
        return $query->execute();
    }

    // Met à jour une activité
    public function update($id, $type, $date, $notes = null)
    {
        $query = $this->db->prepare('UPDATE activities SET type = :type, date = :date, notes = :notes WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':notes', $notes, PDO::PARAM_STR);
        return $query->execute();
    }
}
