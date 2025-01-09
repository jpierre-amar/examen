<?php require 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        <?= htmlspecialchars($_SESSION['success']) ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Liste des Bébés</h1>
        <a href="index.php?ctrl=Baby&action=create"
           class="inline-block mb-6 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
            Créer un bébé
        </a>

        <?php if (!empty($babies)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($babies as $baby): ?>
                    <!-- Card -->
                    <div class="p-6 bg-white border border-gray-300 rounded-xl shadow-lg hover:shadow-2xl transform transition-all duration-300">
                        <!-- Nom -->
                        <h2 class="text-xl font-bold text-gray-800 mb-3"><?= htmlspecialchars($baby['name']) ?></h2>

                        <!-- Date de naissance et âge -->
                        <p class="text-gray-600">
                            Date de naissance : <?= htmlspecialchars($baby['birth_date']) ?>
                            <br>
                            <span class="italic text-sm">(<?= Baby::calculateAge($baby['birth_date']) ?>)</span>
                        </p>

                        <!-- Boutons -->
                        <div class="mt-4 flex justify-between">
                            <a href="index.php?ctrl=Activity&action=create&baby_id=<?= ($baby['id']) ?>"
                               class="px-4 py-2 bg-violet-500 text-white font-semibold rounded-lg shadow-md hover:bg-violet-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                Ajouter une activité
                            </a>
                            <a href="index.php?ctrl=Baby&action=edit&id=<?= ($baby['id']) ?>"
                               class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                Éditer
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-gray-500 text-center mt-6">Aucun bébé enregistré pour le moment.</p>
        <?php endif; ?>
    </div>

<?php include 'views/inc/footer.php'; ?>