<?php
namespace App\Controllers;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return $this->view('auth/login');
    }

    public function login()
    {
        // Logique de connexion à implémenter
    }
}
