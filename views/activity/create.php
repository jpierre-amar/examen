
<h1>Ajouter une Activité</h1>
<form action="index.php?ctrl=Activity&action=store&baby_id=<?= $_GET['baby_id']?>" method="POST">
    <label for="type">Type d'Activité:</label>
    <select name="type" id="type" required>
        <option value="1">Repas</option>
        <option value="2">Sommeil</option>
        <option value="3">Changement de couche</option>
    </select>

    <label for="date">Date et Heure:</label>
    <input type="datetime-local" name="date" id="date" required>

    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes"></textarea>

    <button type="submit">Ajouter</button>
</form>