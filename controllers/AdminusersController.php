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
        // security to avoid direct access
        $this->requireSessionAdmin();

        $role = isset($_GET['role']) ? $_GET['role'] : null;
        $users = $this->userModel->findAllUsersByRole($role);

        include 'views/admin/users/index.php';
    }
}
