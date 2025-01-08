<?php require 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

<h1 class="text-2xl font-bold mb-4">Ajouter un Nouveau Bébé</h1>
<form action="index.php?ctrl=Baby&action=store" method="POST" class="space-y-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nom:</label>
        <input type="text" name="name" id="name" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label for="birth_date" class="block text-sm font-medium text-gray-700">Date de naissance:</label>
        <input type="date" name="birth_date" id="birth_date" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <button type="submit"
            class="px-4 py-2 bg-violet-500 text-white font-semibold rounded-lg shadow-md hover:bg-violet-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
        Ajouter
    </button>
</form>

<?php require 'views/inc/footer.php'; ?>
