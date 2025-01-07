<?php
?>
<main class="flex items-center my-16 justify-center bg-gray-100">
    <div class="container max-w-md p-6 bg-white shadow-lg border border-gray-300 rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-4">Connexion</h1>
        <form method="POST" action="index.php?ctrl=Auth&action=login" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                Se connecter
            </button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">
            <a href="/auth/forgot-password" class="text-blue-500 hover:underline">Mot de passe oublié ?</a>
        </p>
        <p class="mt-2 text-center text-sm text-gray-600">
            <a href="index.php?ctrl=Auth&action=showRegisterForm" class="text-blue-500 hover:underline">Créer un compte</a>
        </p>
    </div>
</main>