<?php

class Mesure
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findByBabyId(int $babyId): array
    {
        $query = $this->db->prepare('SELECT * FROM mesures WHERE baby_id = :baby_id ORDER BY date_mesure DESC LIMIT 1');
        $query->bindParam(':baby_id', $babyId, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Retourne les données ou des valeurs par défaut
        return $result ?: [
            'genre' => 0, // Par défaut : garçon
            'poids' => '',
            'taille' => '',
            'date_mesure' => '',
        ];
    }

    public function update(array $data): bool
    {
        $query = $this->db->prepare('
            UPDATE mesures 
            SET genre = :genre, poids = :poids, taille = :taille, date_mesure = :date_mesure 
            WHERE baby_id = :baby_id
        ');
        $query->bindParam(':genre', $data['genre'], PDO::PARAM_INT);
        $query->bindParam(':poids', $data['poids'], PDO::PARAM_STR);
        $query->bindParam(':taille', $data['taille'], PDO::PARAM_STR);
        $query->bindParam(':date_mesure', $data['date_mesure'], PDO::PARAM_STR);
        $query->bindParam(':baby_id', $data['baby_id'], PDO::PARAM_INT);

        if (!$query->execute()) {
            // Journalise l'erreur en cas de problème
            error_log(print_r($query->errorInfo(), true));
            return false;
        }

        return true;
    }

    public function create(array $data): bool
    {
        $query = $this->db->prepare('
            INSERT INTO mesures (baby_id, genre, poids, taille, date_mesure, created_at)
            VALUES (:baby_id, :genre, :poids, :taille, :date_mesure, NOW())
        ');
        $query->bindParam(':baby_id', $data['baby_id'], PDO::PARAM_INT);
        $query->bindParam(':genre', $data['genre'], PDO::PARAM_INT);
        $query->bindParam(':poids', $data['poids'], PDO::PARAM_STR);
        $query->bindParam(':taille', $data['taille'], PDO::PARAM_STR);
        $query->bindParam(':date_mesure', $data['date_mesure'], PDO::PARAM_STR);

        if (!$query->execute()) {
            // Journalise l'erreur en cas de problème
            error_log(print_r($query->errorInfo(), true));
            return false;
        }

        return true;
    }
}