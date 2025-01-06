<?php
// Vue pour modifier les informations d'un bébé existant
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Bébé</title>
</head>
<body>
<h1>Modifier les Informations du Bébé</h1>
<form action="/babies/update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($baby['id']) ?>">

    <label for="name">Nom:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($baby['name']) ?>" required>

    <label for="birth_date">Date de naissance:</label>
    <input type="date" name="birth_date" id="birth_date" value="<?= htmlspecialchars($baby['birth_date']) ?>" required>

    <button type="submit">Mettre à jour</button>
</form>
</body>
</html>