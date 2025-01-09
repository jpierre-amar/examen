<?php require 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Modifier les Informations du Bébé</h1>

        <form action="index.php?ctrl=Baby&action=update" method="POST" class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- ID Caché -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($baby['id']) ?>">

            <!-- Section : Informations Générales -->
            <fieldset class="mb-6">
                <legend class="text-lg font-bold text-gray-700 mb-2">Informations Générales</legend>

                <!-- Nom -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom :</label>
                    <input type="text" name="name" id="name" value="<?= htmlspecialchars($baby['name']) ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>

                <!-- Date de Naissance -->
                <div class="mb-4">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Date de naissance :</label>
                    <input type="date" name="birth_date" id="birth_date" value="<?= htmlspecialchars($baby['birth_date']) ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>
            </fieldset>

            <!-- Section : Mesures -->
            <fieldset class="mb-6 border-t pt-6">
                <legend class="text-lg font-bold text-gray-700 mb-2">Mesures</legend>

                <!-- Genre -->
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre :</label>
                    <select name="genre" id="genre"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                        <option value="0" <?= $mesures['genre'] == 0 ? 'selected' : '' ?>>Garçon</option>
                        <option value="1" <?= $mesures['genre'] == 1 ? 'selected' : '' ?>>Fille</option>
                    </select>
                </div>

                <!-- Poids -->
                <div class="mb-4">
                    <label for="poids" class="block text-sm font-medium text-gray-700">Poids (kg) :</label>
                    <input type="number" step="0.01" name="poids" id="poids" value="<?= htmlspecialchars($mesures['poids']) ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>

                <!-- Taille -->
                <div class="mb-4">
                    <label for="taille" class="block text-sm font-medium text-gray-700">Taille (cm) :</label>
                    <input type="number" step="0.1" name="taille" id="taille" value="<?= htmlspecialchars($mesures['taille']) ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>

                <!-- Date de la Mesure -->
                <div class="mb-4">
                    <label for="date_mesure" class="block text-sm font-medium text-gray-700">Date de la mesure :</label>
                    <input type="date" name="date_mesure" id="date_mesure" value="<?= htmlspecialchars($mesures['date_mesure']) ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           required>
                </div>
            </fieldset>

            <!-- Boutons -->
            <div class="flex justify-between">
                <a href="index.php?ctrl=Baby&action=index"
                   class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Annuler
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Mettre à jour
                </button>
            </div>

            <!-- Bouton Supprimer -->
            <div class="mt-4 text-right">
                <a href="index.php?ctrl=Baby&action=delete&id=<?= htmlspecialchars($baby['id']) ?>"
                   class="px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Supprimer
                </a>
            </div>
        </form>
    </div>

<?php require 'views/inc/footer.php'; ?>