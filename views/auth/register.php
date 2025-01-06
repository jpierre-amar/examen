<?php
// Vue pour afficher le formulaire d'inscription
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<h1>Inscription</h1>
<form action="/auth/register" method="POST">
    <label for="name">Nom complet:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" id="password" required>

    <label for="confirm_password">Confirmer le mot de passe:</label>
    <input type="password" name="confirm_password" id="confirm_password" required>

    <button type="submit">S'inscrire</button>
</form>
</body>
</html>
