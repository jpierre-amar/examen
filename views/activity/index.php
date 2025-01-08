<h1>Liste des Activités</h1>

<!-- Bouton pour ajouter une nouvelle activité -->
<a href="index.php?ctrl=Activity&action=create&baby_id=<?= htmlspecialchars($babyId) ?>"
   class="inline-block mb-6 px-4 py-2 bg-violet-500 text-white font-semibold rounded-lg shadow-md hover:bg-violet-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
    Ajouter une activité
</a>

<?php if (!empty($activities)): ?>
    <ul>
        <?php foreach ($activities as $activity): ?>
            <li class="mb-4 p-4 border rounded-lg shadow">
                <p><strong>Type:</strong> <?= htmlspecialchars($activity['type']) ?></p>
                <p><strong>Date:</strong> <?= htmlspecialchars($activity['date']) ?></p>
                <p><strong>Notes:</strong> <?= htmlspecialchars($activity['notes']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune activité enregistrée pour ce bébé.</p>
<?php endif; ?>