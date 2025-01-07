<?php

class AuthController extends Controller
{
    public function showLoginForm(): null
    {
        return $this->view('views/auth/login');
    }

    public function showRegisterForm()
    {
        return $this->view('views/auth/register');
    }

    public function register()
    {
        // Récupération des datas dans POST
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Vérification que ce n'est pas vide
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Tous les champs sont requis.";
            header("Location: index.php?ctrl=Auth&action=showRegisterForm");
            exit;
        }

        // Appel du model et instanciation de l'objet User
        require_once 'models/User.php';
        require_once 'config/Database.php';
        $pdo = Database::getConnection();
        $userModel = new User($pdo);

        // Vérifie que l'adresse mail existe ou pas dans la BDD
        if ($userModel->emailExists($email)) {
            $_SESSION['error'] = "Cet e-mail est déjà utilisé.";
            header("Location: index.php?ctrl=Auth&action=showRegisterForm");
            exit;
        }

        // Hashage du mdp
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


        $success = $userModel->create($email, $hashedPassword);

        if ($success) {
            $_SESSION['success'] = "Inscription réussie !";
            $user = $userModel->findByEmail($email);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email']
            ];
            header("Location: index.php?ctrl=Home&action=index");
        } else {
            $_SESSION['error'] = "Une erreur est survenue. Veuillez réessayer.";
            header("Location: index.php?ctrl=Auth&action=showRegisterForm");
        }
        exit;
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Tous les champs sont requis.";
            header("Location: index.php?ctrl=Auth&action=showLoginForm");
            exit;
        }
        require_once 'models/User.php';
        require_once 'config/Database.php';
        $pdo = Database::getConnection();
        $userModel = new User($pdo);
        if ($userModel->emailExists($email)) {
            if ($userModel->login($email, $password)) {
                header("Location: index.php?ctrl=Home&action=index");
            } else {
                $_SESSION['loginError'] = "Mauvais identifiant ou mot de passe.";
                header("Location: index.php?ctrl=Auth&action=showLoginForm");
                exit;
            }

        }
    }

    public function logout(): void
    {
        session_destroy();
    }
}
