<?php
// Vue pour afficher le formulaire de création d'un nouveau mot de passe
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
</head>
<body>
<h1>Créer un nouveau mot de passe</h1>
<form action="/auth/reset-password" method="POST">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

    <label for="password">Nouveau mot de passe:</label>
    <input type="password" name="password" id="password" required>

    <label for="confirm_password">Confirmer le mot de passe:</label>
    <input type="password" name="confirm_password" id="confirm_password" required>

    <button type="submit">Réinitialiser</button>
</form>
</body>
</html>
