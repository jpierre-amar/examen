<?php
// Vue pour afficher les bébés partagés avec l'utilisateur
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bébés partagés</title>
</head>
<body>
<h1>Bébés partagés avec moi</h1>
<?php if (!empty($sharedBabies)): ?>
    <ul>
        <?php foreach ($sharedBabies as $baby): ?>
            <li>
                <h2><?= htmlspecialchars($baby['name']) ?></h2>
                <p>Date de naissance: <?= htmlspecialchars($baby['birth_date']) ?></p>
                <p>Partagé par: <?= htmlspecialchars($baby['shared_by']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun bébé partagé pour le moment.</p>
<?php endif; ?>
</body>
</html>