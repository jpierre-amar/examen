<?php

?>
<body>
<h1>Connexion</h1>
<form method="POST" action="/login">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Se connecter</button>
</form>
<p><a href="/auth/forgot-password">Mot de passe oublié ?</a></p>
</body>
