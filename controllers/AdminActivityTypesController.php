<?php

class AdminActivityTypesController extends BaseAdminController
{
    private $activityTypeModel;

    public function __construct()
    {
        $this->activityTypeModel = new ActivityType();
    }

    public function add()
    {
        $this->requireSessionAdmin();
        include 'views/admin/activities/addActivity.php';
    }

    public function store()
    {
        $this->requireSessionAdmin();

        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;

        if (empty($name) || empty($description)) {
            $_SESSION['error'] = "Tous les champs sont requis.";
            header('Location: index.php?ctrl=AdminActivityTypes&action=add');
            exit;
        }

        $success = $this->activityTypeModel->create($name, $description);

        if ($success) {
            $_SESSION['success'] = "Type d'activité ajouté avec succès.";
            header('Location: index.php?ctrl=AdminActivityTypes&action=add');
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de l'ajout.";
            header('Location: index.php?ctrl=AdminActivityTypes&action=add');
        }
        exit;
    }
}