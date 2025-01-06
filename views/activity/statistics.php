<?php
// Vue pour afficher les statistiques des activités d'un bébé
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Activités</title>
</head>
<body>
<h1>Statistiques des Activités</h1>
<?php if (!empty($statistics)): ?>
    <h2>Résumé</h2>
    <p>Total des repas : <?= htmlspecialchars($statistics['meals']) ?></p>
    <p>Total des heures de sommeil : <?= htmlspecialchars($statistics['sleep_hours']) ?></p>
    <p>Total des changements de couches : <?= htmlspecialchars($statistics['diapers']) ?></p>

    <h2>Tendances</h2>
    <!-- Ici, un graphique ou un tableau pourrait être ajouté -->
    <p>Activités récentes : </p>
    <ul>
        <?php foreach ($statistics['recent_activities'] as $activity): ?>
            <li><?= htmlspecialchars($activity['type']) ?> le <?= htmlspecialchars($activity['date']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune donnée statistique disponible pour le moment.</p>
<?php endif; ?>
</body>
</html>
