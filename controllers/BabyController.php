<?php
require_once 'models/Baby.php';
require_once 'config/Database.php';
class BabyController
{
    private $babyModel;

    public function __construct()
    {
        // Initialisation de la connexion à la base de données
        $db = Database::getConnection();
        $this->babyModel = new Baby($db);
    }
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
        include 'views/baby/create.php';
    }

    // Enregistre un nouveau bébé
    public function store()
    {
        // Vérification des données POST
        if (isset($_POST['name'], $_POST['birth_date'])) {
            $name = htmlspecialchars(trim($_POST['name'])); // Sécurisation de l'entrée
            $birthDate = htmlspecialchars(trim($_POST['birth_date'])); // Sécurisation de l'entrée

            // Appel au modèle pour créer le bébé
            $this->babyModel->create($_SESSION['user_id'], $name, $birthDate);

            // Redirection vers l'index
            header('Location: index.php?ctrl=Baby&action=index');
            exit;
        } else {
            // Gestion d'erreur en cas de données manquantes
            $_SESSION['error'] = "Tous les champs sont requis.";
            header('Location: index.php?ctrl=Baby&action=create');
            exit;
        }
    }

    // Affiche le formulaire pour modifier un bébé
    public function edit($id)
    {
        // Récupération du bébé par son ID
        $baby = $this->babyModel->findById($id);

        if (!$baby) {
            // Si aucun bébé n'est trouvé, rediriger avec un message d'erreur
            $_SESSION['error'] = "Bébé introuvable.";
            header('Location: index.php?ctrl=Baby&action=index&id=' . $id);
            exit;
        }

        // Inclure la vue avec les données du bébé
        include 'views/baby/edit.php';
    }

    // Met à jour un bébé existant
    public function update(): void
    {
        $this->babyModel->update($_POST);
        header('Location: index.php?ctrl=Baby&action=index');
    }
}
