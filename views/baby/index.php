<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Liste des Bébés</h1>
    <a href="index.php?ctrl=Baby&action=create"
       class="inline-block mb-6 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
        Créer un bébé
    </a>

    <?php if (!empty($babies)): ?>
        <div class="p-6 border-2 border-gray-300 rounded-lg bg-gray-50 shadow-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($babies as $baby): ?>
                    <div class="relative p-4 bg-white border border-gray-200 rounded-lg shadow-md">
                        <!-- Lien pour les activités (entoure toute la carte) -->
                        <a href="index.php?ctrl=Activity&action=index&id=<?= ($baby['id']) ?>"
                           class="absolute inset-0 z-10"></a>

                        <!-- Lien pour l'édition -->
                        <a href="index.php?ctrl=Baby&action=edit&id=<?= ($baby['id']) ?>"
                           class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 z-20">
                            <p>Editer</p>
                        </a>

                        <!-- Contenu de la carte -->
                        <h2 class="text-lg font-bold text-gray-700 mb-2"><?= ($baby['name']) ?></h2>
                        <p class="text-gray-500">Date de naissance : <?= ($baby['birth_date']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-gray-500 text-center mt-6">Aucun bébé enregistré pour le moment.</p>
    <?php endif; ?>
</div>