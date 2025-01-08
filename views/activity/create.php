
<h1>Ajouter une Activité</h1>
<form action="index.php?ctrl=Activity&action=store" method="GET">
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