<?php
// Vue pour afficher la liste des activités d'un bébé
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités du Bébé</title>
</head>
<body>
<h1>Liste des Activités</h1>
<?php if (!empty($activities)): ?>
    <ul>
        <?php foreach ($activities as $activity): ?>
            <li>
                <p>Type: <?= ($activity['type']) ?></p>
                <p>Date: <?= ($activity['date']) ?></p>
                <p>Notes: <?= ($activity['notes']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune activité enregistrée pour ce bébé.</p>
<?php endif; ?>
</body>
</html>
