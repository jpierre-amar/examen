<?php

class BaseAdminController
{
    protected function requireSessionAdmin()
    {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            $_SESSION['error'] = "Accès non autorisé. Veuillez vous connecter en tant qu'administrateur.";
            header('Location: index.php?ctrl=Auth&action=showLoginForm');
            exit;
        }
    }
}