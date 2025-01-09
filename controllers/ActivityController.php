<?php

// Contrôleur ActivityController - Gère les activités d'un bébé
class ActivityController
{
    private $activityModel;
    private $activityType;

    public function __construct()
    {
        $this->activityModel = new Activity();
        $this->activityType = new ActivityType();
    }

    // Affiche la liste des activités
    public function index($babyId)
    {
        if (empty($babyId)) {
            $_SESSION['error'] = "ID de bébé invalide.";
            header('Location: index.php?ctrl=Baby&action=index');
            exit;
        }

        $activities = $this->activityModel->findAllByBaby($babyId);
        include 'views/activity/index.php';
    }

    // Affiche le formulaire pour ajouter une activité
    public function create()
    {
        // Récupérer les types d'activités
        $activityTypes = $this->activityType->findAll();

        // Inclure la vue en passant les données
        include 'views/activity/create.php';
    }

    // Enregistre une nouvelle activité
    public function store()
    {
        $babyId = $_GET['baby_id'];
        $type = $_POST['type'];
        $date = $_POST['date'];
        $notes = $_POST['notes'];
        $this->activityModel->create($babyId, $type, $date, $notes);

        header('Location: index.php?ctrl=Activity&action=index&id=' . $babyId);
        exit;
    }

    // Affiche le formulaire pour modifier une activité
    public function edit($id)
    {
        $activity = $this->activityModel->findById($id);
        include 'views/activity/edit.php';
    }

    // Met à jour une activité existante
    public function update($id, $type, $date, $notes)
    {
        $this->activityModel->update($id, $type, $date, $notes);
        header('Location: /activities/' . $_POST['baby_id']);
    }
}
