<?php
// Contrôleur DashboardController - Gère le tableau de bord principal
class DashboardController
{
    private $babyModel;
    private $activityModel;

    public function __construct($babyModel, $activityModel)
    {
        $this->babyModel = $babyModel;
        $this->activityModel = $activityModel;
    }

    // Affiche le tableau de bord principal
    public function index()
    {
        // Récupère un aperçu rapide des données pour l'utilisateur connecté
        $overview = [
            'total_babies' => count($this->babyModel->findAllByUser($_SESSION['user_id'])),
            'weekly_activities' => $this->activityModel->countActivitiesThisWeek($_SESSION['user_id']),
        ];

        // Récupère les activités récentes
        $recentActivities = $this->activityModel->getRecentActivities($_SESSION['user_id']);

        // Charge la vue du tableau de bord
        include __DIR__ . '/../views/dashboard.php';
    }
}
