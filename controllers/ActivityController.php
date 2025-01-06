<?php
// Contrôleur ActivityController - Gère les activités d'un bébé
class ActivityController
{
    private $activityModel;

    public function __construct($activityModel)
    {
        $this->activityModel = $activityModel;
    }

    // Affiche la liste des activités
    public function index($babyId)
    {
        $activities = $this->activityModel->findAllByBaby($babyId);
        include __DIR__ . '/../views/activity/index.php';
    }

    // Affiche le formulaire pour ajouter une activité
    public function create()
    {
        include __DIR__ . '/../views/activity/create.php';
    }

    // Enregistre une nouvelle activité
    public function store($babyId, $type, $date, $notes)
    {
        $this->activityModel->create($babyId, $type, $date, $notes);
        header('Location: /activities/' . $babyId);
    }

    // Affiche le formulaire pour modifier une activité
    public function edit($id)
    {
        $activity = $this->activityModel->findById($id);
        include __DIR__ . '/../views/activity/edit.php';
    }

    // Met à jour une activité existante
    public function update($id, $type, $date, $notes)
    {
        $this->activityModel->update($id, $type, $date, $notes);
        header('Location: /activities/' . $_POST['baby_id']);
    }
}
