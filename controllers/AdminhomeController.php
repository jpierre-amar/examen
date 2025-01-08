<?php

class AdminhomeController
{
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


        include 'views/admin/home/index.php';
    }
}
