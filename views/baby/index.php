<?php
// Vue pour afficher la liste des bébés de l'utilisateur
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Bébés</title>
</head>
<body>
<h1>Mes Bébés</h1>
<?php if (!empty($babies)): ?>
    <ul>
        <?php foreach ($babies as $baby): ?>
            <li>
                <h2><?= htmlspecialchars($baby['name']) ?></h2>
                <p>Date de naissance: <?= htmlspecialchars($baby['birth_date']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Vous n'avez ajouté aucun bébé.</p>
<?php endif; ?>
</body>
</html>
