<?php
// Contrôleur BabyController - Gère les actions liées aux bébés
class BabyController
{
    private $babyModel;


    // Affiche la liste des bébés
    public function index()
    {
        require_once 'config/Database.php';
        $pdo = Database::getConnection();
        $this->babyModel = new Baby($pdo);
        $babies = $this->babyModel->findAllByUser($_SESSION['user_id']);
        include "views/baby/index.php";
    }

    // Affiche le formulaire pour ajouter un bébé
    public function create()
    {
        include __DIR__ . '/../views/baby/create.php';
    }

    // Enregistre un nouveau bébé
    public function store($name, $birthDate)
    {
        $this->babyModel->create($_SESSION['user_id'], $name, $birthDate);
        header('Location: /babies');
    }

    // Affiche le formulaire pour modifier un bébé
    public function edit($id)
    {
        $baby = $this->babyModel->findById($id);
        include __DIR__ . '/../views/baby/edit.php';
    }

    // Met à jour un bébé existant
    public function update($id, $name, $birthDate)
    {
        $this->babyModel->update($id, $name, $birthDate);
        header('Location: /babies');
    }
}
