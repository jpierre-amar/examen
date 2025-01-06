<?php
// Vue pour ajouter une nouvelle activité pour un bébé
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Activité</title>
</head>
<body>
<h1>Ajouter une Activité</h1>
<form action="/activities/store" method="POST">
    <input type="hidden" name="baby_id" value="<?= htmlspecialchars($baby['id']) ?>">

    <label for="type">Type d'Activité:</label>
    <select name="type" id="type" required>
        <option value="meal">Repas</option>
        <option value="sleep">Sommeil</option>
        <option value="diaper">Changement de couche</option>
    </select>

    <label for="date">Date et Heure:</label>
    <input type="datetime-local" name="date" id="date" required>

    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes"></textarea>

    <button type="submit">Ajouter</button>
</form>
</body>
</html>
