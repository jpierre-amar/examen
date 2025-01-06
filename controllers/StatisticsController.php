<?php
// Contrôleur StatisticsController - Gère les statistiques liées aux activités
class StatisticsController
{
    private $activityModel;

    public function __construct($activityModel)
    {
        $this->activityModel = $activityModel;
    }

    // Affiche les statistiques des activités d'un bébé
    public function show($babyId)
    {
        $statistics = $this->activityModel->getStatistics($babyId);
        include __DIR__ . '/../views/activity/statistics.php';
    }
}
