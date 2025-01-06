<?php
// Menu de navigation réutilisable pour l'application
?>
<nav class="navbar">
        <a href="/index.php">Accueil</a>
        <a href="/babies">Mes bébés</a>
        <a href="/activities">Activités</a>
        <a href="/statistics">Statistiques</a>
        <a href="/settings">Paramètres</a>
    <?php
    if (!isset($_SESSION['user'])) {
        <a href="index.php?ctrl=Auth&action=showLoginForm">Se connecter</a>
    }else {
        <a href="index.php?ctrl=Auth&action=logout">Se déconnecter</a>
    }
    ?>

</nav>
