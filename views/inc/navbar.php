<nav class="navbar">
        <a href="index.php?ctrl=Home&action=index">Accueil</a>
        <a href="index.php?ctrl=Baby&action=index">Mes bébés</a>
        <a href="/activities">Activités</a>
        <a href="/statistics">Statistiques</a>
        <a href="/settings">Paramètres</a>
    <?php if (!isset($_SESSION['user'])): ?>
        <a href="index.php?ctrl=Auth&action=showLoginForm">Se connecter / S'inscrire</a>
    <?php else: ?>
        <a href="index.php?ctrl=Auth&action=logout">Se déconnecter</a>
    <?php endif; ?>
</nav>