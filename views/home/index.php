<!DOCTYPE html>
<html>
<head>
    <title>Baby Tracker</title>
</head>
<body>
    <h1>Bienvenue sur Baby Tracker</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Vous êtes connecté</p>
        <a href="/babies">Voir mes bébés</a>
    <?php else: ?>
        <p>Veuillez vous connecter pour continuer</p>
        <a href="/login">Se connecter</a>
    <?php endif; ?>
</body>
</html> 