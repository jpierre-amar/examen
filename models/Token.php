<?php
// Modèle Token - Gère la génération et la validation des tokens pour l'authentification et les liens sécurisés
class Token
{
    private $db;

    // Constructeur - Injecte l'instance de connexion à la base de données
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Génère un nouveau token
    public function generate($userId, $type, $expiresAt)
    {
        $token = bin2hex(random_bytes(32)); // Génère un token aléatoire
        $query = $this->db->prepare('
            INSERT INTO tokens (user_id, type, token, expires_at) 
            VALUES (:user_id, :type, :token, :expires_at)
        ');
        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        $query->bindParam(':expires_at', $expiresAt, PDO::PARAM_STR);
        $query->execute();
        return $token;
    }

    // Valide un token
    public function validate($token, $type)
    {
        $query = $this->db->prepare('
            SELECT * FROM tokens 
            WHERE token = :token AND type = :type AND expires_at > NOW()
        ');
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Supprime un token après validation ou expiration
    public function delete($token)
    {
        $query = $this->db->prepare('DELETE FROM tokens WHERE token = :token');
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        return $query->execute();
    }
}
