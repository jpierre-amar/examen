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
    public function update(array $data)
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
        return $query->execute();
    }

    public function findById($id)
    {
        $query = $this->db->prepare('SELECT * FROM babies WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function calculateAge($birthDate)
    {
        $birthDateTime = new DateTime($birthDate);
        $currentDateTime = new DateTime();

        $interval = $currentDateTime->diff($birthDateTime);
        $years = $interval->y;
        $months = $interval->m;

        if ($years > 0) {
            return "$years an(s) et $months mois";
        } else {
            return "$months mois";
        }
    }

    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM babies WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
