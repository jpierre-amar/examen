<?php

$currentpage = 'Baby Tracker';
require_once 'config/autoloader.php';
require 'config/Database.php';
require_once 'config/config.php';
require 'views/inc/header.php';
include 'views/inc/navbar.php';

//dump($_POST, 'POST');
//dump($_SESSION, 'SESSION');

// Contrôleur et méthode par défaut
$ctrl = 'HomeController';
$method = 'index';

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

        // Vérifier si la méthode existe
        if (method_exists($controller, $method)) {
            // Gestion des données POST
            if (!empty($_POST)) {
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id'], $_POST);
                } else {
                    $controller->$method($_POST);
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
    echo 'Erreur : ' . $e->getMessage();
}

require 'views/inc/footer.php';