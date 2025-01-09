<?php require 'views/admin/inc/header.php'; ?>
<?php include 'views/admin/inc/navbar.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Ajouter un Type d'Activité</h1>

        <form action="index.php?ctrl=AdminActivityTypes&action=store" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Champ Nom -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="name"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       required>
            </div>

            <!-- Champ Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          required></textarea>
            </div>

            <!-- Bouton Soumettre -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Ajouter
                </button>
            </div>
        </form>
    </div>

<?php require 'views/admin/inc/footer.php'; ?>