<?php
// Vue pour afficher le formulaire de réinitialisation du mot de passe
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
</head>
<body>
<h1>Réinitialiser le mot de passe</h1>
<form action="/auth/forgot-password" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <button type="submit">Envoyer un lien de réinitialisation</button>
</form>
</body>
</html>
