<?php require 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

<h1>Modifier une Activité</h1>
<form action="/activities/update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($activity['id']) ?>">
    <input type="hidden" name="baby_id" value="<?= htmlspecialchars($activity['baby_id']) ?>">

    <label for="type">Type d'Activité:</label>
    <select name="type" id="type" required>
        <option value="meal" <?= $activity['type'] === 'meal' ? 'selected' : '' ?>>Repas</option>
        <option value="sleep" <?= $activity['type'] === 'sleep' ? 'selected' : '' ?>>Sommeil</option>
        <option value="diaper" <?= $activity['type'] === 'diaper' ? 'selected' : '' ?>>Changement de couche</option>
    </select>

    <label for="date">Date et Heure:</label>
    <input type="datetime-local" name="date" id="date" value="<?= htmlspecialchars($activity['date']) ?>" required>

    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes"><?= htmlspecialchars($activity['notes']) ?></textarea>

    <button type="submit">Mettre à jour</button>
</form>

<?php require 'views/inc/footer.php'; ?>
