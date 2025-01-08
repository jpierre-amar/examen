<?php require 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

<?php

?>
<h1>Modifier les Informations du Bébé</h1>
<form action="index.php?ctrl=Baby&action=update" method="POST">
    <input type="hidden" name="id" value="<?= ($baby['id']) ?>">

    <label for="name">Nom:</label>
    <input type="text" name="name" id="name" value="<?= ($baby['name']) ?>" required>

    <label for="birth_date">Date de naissance:</label>
    <input type="date" name="birth_date" id="birth_date" value="<?= ($baby['birth_date']) ?>" required>

    <button type="submit">Mettre à jour</button>
</form>

<?php require 'views/inc/footer.php'; ?>
