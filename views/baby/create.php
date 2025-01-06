<?php
// Vue pour ajouter un nouveau bébé
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Bébé</title>
</head>
<body>
<h1>Ajouter un Nouveau Bébé</h1>
<form action="/babies/store" method="POST">
    <label for="name">Nom:</label>
    <input type="text" name="name" id="name" required>

    <label for="birth_date">Date de naissance:</label>
    <input type="date" name="birth_date" id="birth_date" required>

    <button type="submit">Ajouter</button>
</form>
</body>
</html>