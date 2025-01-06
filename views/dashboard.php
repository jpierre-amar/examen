<?php
// Vue du tableau de bord principal de l'application Baby Tracker
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
<h1>Bienvenue sur Baby Tracker</h1>

<!-- Section pour afficher un aperçu rapide des données -->
<section id="quick-overview">
    <h2>Résumé rapide</h2>
    <div>
        <p>Bébés suivis : <?= htmlspecialchars($overview['total_babies'] ?? 0) ?></p>
        <p>Activités enregistrées cette semaine : <?= htmlspecialchars($overview['weekly_activities'] ?? 0) ?></p>
    </div>
</section>

<!-- Section pour afficher les dernières activités enregistrées -->
<section id="recent-activities">
    <h2>Dernières Activités</h2>
    <?php if (!empty($recentActivities)): ?>
        <ul>
            <?php foreach ($recentActivities as $activity): ?>
                <li>
                    <strong><?= htmlspecialchars($activity['type']) ?></strong> pour
                    <em><?= htmlspecialchars($activity['baby_name']) ?></em>
                    le <?= htmlspecialchars($activity['date']) ?> :
                    <?= htmlspecialchars($activity['notes'] ?? 'Pas de notes') ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune activité récente.</p>
    <?php endif; ?>
</section>

<!-- Section pour accéder rapidement aux fonctionnalités principales -->
<section id="quick-actions">
    <h2>Actions rapides</h2>
    <ul>
        <li><a href="/babies/create">Ajouter un bébé</a></li>
        <li><a href="/activities/create">Ajouter une activité</a></li>
        <li><a href="/statistics">Voir les statistiques</a></li>
    </ul>
</section>
</body>
</html>
