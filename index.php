<?php

$currentpage = 'Baby Tracker';
require_once 'config/autoloader.php';
require_once 'config/config.php';
require 'views/inc/header.php';
include 'views/inc/navbar.php';
//dump($_POST, 'POST');
//dump($_SESSION, 'SESSION');
$ctrl = 'HomeController'; // Valeur par défaut


if (isset($_GET['ctrl'])) {
    // Assurez-vous que 'User' est passé dans l'URL
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller'; // Cela donnera 'UserController'
}

$method = 'index'; // Valeur par défaut

if (isset($_GET['action'])) {
    $method = $_GET['action'];
}

try {
    if (class_exists($ctrl)) {
        $controller = new $ctrl();

        if (!empty($_POST)) {
            if (method_exists($controller, $method)) {
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id'], $_POST);
                } else {
                    $controller->$method($_POST);

                }
            }
        } else {
            if (method_exists($controller, $method)) {
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                    $controller->$method($_GET['id']);
                } else
                {
                    $controller->$method();
                }
            }
        }
    } else {
        throw new Exception("Le contrôleur '$ctrl' n'existe pas.");
    }
    if (isset($_GET['action']) && $_GET['action'] == 'validateUser') {
        include 'index.php';
    }
} catch (Exception $e) {
    throw new Exception('Erreur : ' . $e->getMessage());
}

require 'views/inc/footer.php';
