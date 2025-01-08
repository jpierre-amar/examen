<?php

$currentpage = 'Baby Tracker';
require_once 'config/autoloader.php';
require 'config/Database.php';
require_once 'config/config.php';
require 'views/inc/header.php';
include 'views/inc/navbar.php';

$ctrl = 'HomeController'; // Contrôleur par défaut
$method = 'index'; // Méthode par défaut

// Vérification du contrôleur dans l'URL
if (isset($_GET['ctrl'])) {
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller'; // Exemple : 'ActivityController'
}

// Vérification de la méthode dans l'URL
if (isset($_GET['action'])) {
    $method = $_GET['action'];
}

try {
    if (class_exists($ctrl)) {
        $controller = new $ctrl();

        // Vérifier si la méthode existe dans le contrôleur
        if (method_exists($controller, $method)) {
            // Si des données POST sont présentes
            if (!empty($_POST)) {
                // Gestion spécifique pour `ActivityController::store`
                if ($ctrl === 'ActivityController' && $method === 'store') {
                    $babyId = $_POST['baby_id'] ?? null;
                    $type = $_POST['type'] ?? null;
                    $date = $_POST['date'] ?? null;
                    $notes = $_POST['notes'] ?? '';

                    if ($babyId && $type && $date) {
                        $controller->store($babyId, $type, $date, $notes);
                    } else {
                        throw new Exception("Les données nécessaires à la création de l'activité sont manquantes.");
                    }
                } else {
                    // Cas général pour POST avec une méthode
                    if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                        $controller->$method($_GET['id'], $_POST);
                    } else {
                        $controller->$method($_POST);
                    }
                }
            } else {
                // Appeler la méthode sans POST
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id']);
                } else {
                    $controller->$method();
                }
            }
        } else {
            throw new Exception("La méthode '$method' n'existe pas dans le contrôleur '$ctrl'.");
        }
    } else {
        throw new Exception("Le contrôleur '$ctrl' n'existe pas.");
    }
} catch (Exception $e) {
    echo '<div class="error">Erreur : ' . htmlspecialchars($e->getMessage()) . '</div>';
}

require 'views/inc/footer.php';