<?php require 'views/admin/inc/header.php'; ?>
<?php include 'views/admin/inc/navbar.php'; ?>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Liste des utilisateurs <?php if (isset($_GET['role']) && $_GET['role'] == 'admin'):?> administrateurs<?php else: ?> classiques<?php endif; ?></h1>

    <?php if (!empty($users)): ?>
        <div class="p-6 border-2 border-gray-300 rounded-lg bg-gray-50 shadow-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($users as $user): ?>
                    <div class="relative p-4 bg-white border border-gray-200 rounded-lg shadow-md">
                        <!-- Lien pour les activités (entoure toute la carte) -->
                        <a href="index.php?ctrl=Activity&action=index&id=<?= ($baby['id']) ?>"
                           class="absolute inset-0 z-10"></a>

                        <!-- Lien pour l'édition -->
                        <a href="index.php?ctrl=AdminUsers&action=edit&id=<?= ($user['id']) ?>"
                           class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 z-20">
                            <p>Editer</p>
                        </a>

                        <!-- Contenu de la carte -->
                        <h2 class="text-lg font-bold text-gray-700 mb-2"><?= ($user['email']) ?></h2>
                        <p class="text-gray-500">
                            Dernière connexion: <?= ($user['lastLogin']) ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-gray-500 text-center mt-6">Aucun bébé enregistré pour le moment.</p>
    <?php endif; ?>
</div>

<?php require 'views/admin/inc/footer.php'; ?>
