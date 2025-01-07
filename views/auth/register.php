<?php
// Vue pour afficher le formulaire d'inscription
?>

<main class="flex items-center justify-center my-16 bg-gray-100">
<div class="container max-w-md p-6 bg-white shadow-lg border border-gray-300 rounded-lg">
    <h1 class="text-3xl font-bold text-center mb-4">Inscription</h1>
    <form action="index.php?ctrl=Auth&action=register" method="POST" class="space-y-4">
        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <!-- Mot de passe -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <!-- Confirmation du mot de passe -->
        <div>
            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" id="confirm_password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <!-- Bouton d'inscription -->
        <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
            S'inscrire
        </button>
    </form>
    <p class="mt-4 text-center text-sm text-gray-600">
        Déjà un compte ?
        <a href="index.php?ctrl=Auth&action=showLoginForm" class="text-blue-500 hover:underline">Se connecter</a>
    </p>
</div>
</main>