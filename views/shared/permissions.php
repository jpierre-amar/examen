<?php
// Vue pour gérer les permissions des utilisateurs pour un bébé partagé
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les permissions</title>
</head>
<body>
<h1>Gérer les permissions pour le bébé</h1>
<?php if (!empty($permissions)): ?>
    <ul>
        <?php foreach ($permissions as $permission): ?>
            <li>
                <p>Utilisateur: <?= htmlspecialchars($permission['user_id']) ?></p>
                <p>Permissions: <?= htmlspecialchars($permission['permission_level']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun utilisateur n'a de permissions pour ce bébé.</p>
<?php endif; ?>
</body>
</html>