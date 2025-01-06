<?php

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return $this->view('views/auth/login');
    }

    public function login()
    {
       // SI mail existe afficher un message qui explique que le mail existe déjà
        // SINON Apeller le modèle User et la méthode "create"
    }

    public function logout(){
        session_destroy();
    }
}
