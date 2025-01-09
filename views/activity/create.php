<?php require 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Ajouter une Activité</h1>

        <!-- Formulaire -->
        <form action="index.php?ctrl=Activity&action=store&baby_id=<?= htmlspecialchars($_GET['baby_id']) ?>"
              method="POST"
              class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">

            <!-- Sélection du Type d'Activité -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type d'Activité</label>
                <select id="type" name="type" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php foreach ($activityTypes as $type): ?>
                        <option value="<?= htmlspecialchars($type['id']) ?>">
                            <?= htmlspecialchars($type['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Date et Heure -->
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date et Heure</label>
                <input type="datetime-local" id="date" name="date" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Notes -->
            <div class="mb-4">
                <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                <textarea id="notes" name="notes"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          placeholder="Ajoutez des notes sur l'activité (facultatif)"></textarea>
            </div>

            <!-- Boutons -->
            <div class="flex justify-end space-x-4">
                <a href="index.php?ctrl=Activity&action=index&id=<?= htmlspecialchars($_GET['baby_id']) ?>"
                   class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Annuler
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Ajouter
                </button>
            </div>
        </form>
    </div>

<?php require 'views/inc/footer.php'; ?>