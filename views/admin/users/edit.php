<?php require 'views/admin/inc/header.php'; ?>
<?php include 'views/admin/inc/navbar.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-8 text-gray-800 text-center">Modifier les informations de l'utilisateur</h1>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <form action="index.php?ctrl=Adminusers&action=update&id=<?= htmlspecialchars($user['id']) ?>" method="POST">
                <!-- Champ Nom -->
                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="last_name" name="last_name"
                           value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>

                <!-- Champ Prénom -->
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="first_name" name="first_name"
                           value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>

                <!-- Champ Téléphone -->
                <div class="mb-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                    <input type="tel" id="phone" name="phone"
                           value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>

                <!-- Boutons -->
                <div class="flex justify-end space-x-4">
                    <a href="index.php?ctrl=Adminusers&action=index"
                       class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75">
                        Annuler
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php require 'views/admin/inc/footer.php'; ?>