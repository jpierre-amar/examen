<?php

class Mesure
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Récupérer les mesures par baby_id
    public function findByBabyId($babyId)
    {
        $query = $this->db->prepare('SELECT * FROM mesures WHERE baby_id = :baby_id ORDER BY date_mesure DESC LIMIT 1');
        $query->bindParam(':baby_id', $babyId, PDO::PARAM_INT);
        $query->execute();

        // Retourne un tableau vide si aucune mesure n'existe
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ?: [
            'genre' => 0, // Par défaut : garçon
            'poids' => '',
            'taille' => '',
            'date_mesure' => '',
        ];
    }

    // Mettre à jour les mesures
    public function update(array $data)
    {
        $query = $this->db->prepare('
            UPDATE mesures 
            SET genre = :genre, poids = :poids, taille = :taille, date_mesure = :date_mesure 
            WHERE baby_id = :baby_id
        ');
        $query->bindParam(':genre', $data['genre'], PDO::PARAM_STR);
        $query->bindParam(':poids', $data['poids'], PDO::PARAM_STR);
        $query->bindParam(':taille', $data['taille'], PDO::PARAM_STR);
        $query->bindParam(':date_mesure', $data['date_mesure'], PDO::PARAM_STR);
        $query->bindParam(':baby_id', $data['baby_id'], PDO::PARAM_INT);
        return $query->execute();
    }
}