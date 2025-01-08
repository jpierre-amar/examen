<?php
// Modèle Activity - Gère les interactions avec la table des activités
class Activity
{
    private $db;

    // Constructeur - Injecte l'instance de connexion à la base de données
    public function __construct()
    {
        $db = Database::getConnection();
        $this->activityModel = new Activity($db);
    }

    // Récupère toutes les activités associées à un bébé
    public function findAllByBaby($babyId)
    {
        $query = $this->db->prepare('SELECT * FROM activities WHERE baby_id = :baby_id ORDER BY created_at DESC');
        $query->bindParam(':baby_id', $babyId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crée une nouvelle activité
    public function create($babyId, $type, $date, $notes)
    {
        $query = $this->db->prepare('INSERT INTO activities (baby_id, activity_type_id, created_at, notes) VALUES (:baby_id, :type, :date, :notes)');
        $query->bindParam(':baby_id', $babyId, PDO::PARAM_INT);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':notes', $notes, PDO::PARAM_STR);
        $query->execute();
    }

    // Met à jour une activité
    public function update($id, $type, $date, $notes = null)
    {
        $query = $this->db->prepare('UPDATE activities SET activity_type_id = :type, created_at = :date, notes = :notes WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':notes', $notes, PDO::PARAM_STR);
        return $query->execute();
    }
}
