<?php
// Vue pour partager un bébé avec d'autres utilisateurs
?>
<h1>Partager un Bébé</h1>
<form action="/babies/share" method="POST">
    <input type="hidden" name="baby_id" value="<?= htmlspecialchars($baby['id']) ?>">

    <label for="user_email">Email de l'utilisateur:</label>
    <input type="email" name="user_email" id="user_email" required>

    <label for="permissions">Permissions:</label>
    <select name="permissions" id="permissions">
        <option value="read">Lecture seule</option>
        <option value="edit">Lecture et modification</option>
    </select>

    <button type="submit">Partager</button>
</form>
