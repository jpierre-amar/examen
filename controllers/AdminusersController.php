<?php

require_once 'models/User.php';
require_once 'config/Database.php';

class AdminusersController
{
    private $userModel;

    public function __construct()
    {
        // Initialisation de la connexion à la base de données
        $db = Database::getConnection();
        $this->userModel = new User($db);
    }

    private function requireSessionAdmin(): void
    {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?ctrl=Home&action=index');
            exit;
        }
    }

    public function index()
    {
        // Sécurité pour l'accès
        $this->requireSessionAdmin();

        $role = isset($_GET['role']) ? $_GET['role'] : null;
        $users = $this->userModel->findAllUsersByRole($role);

        include 'views/admin/users/index.php';
    }

    public function edit($id)
    {
        $this->requireSessionAdmin();

        // Récupération des données de l'utilisateur
        $user = $this->userModel->findById((int)$id);

        // Vérifier si l'utilisateur existe
        if (!$user) {
            $_SESSION['error'] = "Utilisateur introuvable.";
            header('Location: index.php?ctrl=Adminusers&action=index');
            exit;
        }

        // Transmettre les données à la vue
        include 'views/admin/users/edit.php';
    }

    public function delete($id)
    {
        $this->requireSessionAdmin();
        $users = $this->userModel->delete($id);
        header('Location: index.php?ctrl=Adminusers&action=index');
        exit;
    }

    public function update($id)
    {
        $this->requireSessionAdmin();

        // Récupérer les données du formulaire
        $lastName = $_POST['last_name'] ?? null;
        $firstName = $_POST['first_name'] ?? null;
        $phone = $_POST['phone'] ?? null;

        // Validation des données
        if (empty($lastName) || empty($firstName) || empty($phone)) {
            $_SESSION['error'] = "Tous les champs sont requis.";
            header("Location: index.php?ctrl=Adminusers&action=edit&id=$id");
            exit;
        }

        // Nettoyer les espaces du numéro de téléphone
        $phone = preg_replace('/\s+/', '', $phone);

        // Appeler le modèle pour mettre à jour l'utilisateur
        $success = $this->userModel->update($id, $lastName, $firstName, $phone);

        if ($success) {
            $_SESSION['success'] = "Les informations de l'utilisateur ont été mises à jour avec succès.";
            header('Location: index.php?ctrl=Adminusers&action=index');
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de la mise à jour.";
            header("Location: index.php?ctrl=Adminusers&action=edit&id=$id");
        }
        exit;
    }
}
