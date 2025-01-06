<?php
// Modèle Report - Génère et gère les rapports personnalisés pour les activités
class Report
{
    private $db;

    // Constructeur - Injecte l'instance de connexion à la base de données
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Génère un rapport d'activités pour un bébé sur une période donnée
    public function generateReport($babyId, $startDate, $endDate)
    {
        $query = $this->db->prepare('
            SELECT * FROM activities
            WHERE baby_id = :baby_id AND date BETWEEN :start_date AND :end_date
            ORDER BY date ASC
        ');
        $query->bindParam(':baby_id', $babyId, PDO::PARAM_INT);
        $query->bindParam(':start_date', $startDate, PDO::PARAM_STR);
        $query->bindParam(':end_date', $endDate, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Exporte un rapport sous format CSV
    public function exportToCSV($data, $filePath)
    {
        $file = fopen($filePath, 'w');
        // Ajout des en-têtes
        fputcsv($file, ['Type', 'Date', 'Notes']);
        // Ajout des données
        foreach ($data as $row) {
            fputcsv($file, [$row['type'], $row['date'], $row['notes']]);
        }
        fclose($file);
        return $filePath;
    }
}
