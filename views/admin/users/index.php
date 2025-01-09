<?php require 'views/admin/inc/header.php'; ?>
<?php include 'views/admin/inc/navbar.php'; ?>

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-extrabold mb-8 text-gray-900 text-center">
            Liste des Utilisateurs
        </h1>

        <?php if (!empty($users)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($users as $user): ?>
                    <div class="relative bg-white border border-gray-200 rounded-lg shadow-md p-6">
                        <!-- Section Titre et Actions -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-700">
                                <?= htmlspecialchars($user['email']) ?>
                            </h2>
                        </div>

                        <!-- Détails de l'utilisateur -->
                        <p class="text-gray-500 mb-2">
                            <strong>Nom :</strong> <?= htmlspecialchars($user['lastname'] ?? 'Non disponible') ?>
                        </p>
                        <p class="text-gray-500 mb-2">
                            <strong>Prénom :</strong> <?= htmlspecialchars($user['firstname'] ?? 'Non disponible') ?>
                        </p>
                        <p class="text-gray-500 mb-2">
                            <strong>Téléphone :</strong> <?= htmlspecialchars($user['phone'] ?? 'Non disponible') ?>
                        </p>
                        <p class="text-gray-500 mb-2">
                            Dernière connexion : <?= htmlspecialchars($user['lastLogin'] ?? 'Non disponible') ?>
                        </p>

                        <!-- Boutons d'action -->
                        <div class="flex justify-between mt-4">
                            <a href="index.php?ctrl=Adminusers&action=edit&id=<?= ($user['id']) ?>"
                               class="px-4 py-2 bg-blue-500 text-white rounded-md text-sm shadow-md hover:bg-blue-600">
                                Éditer
                            </a>
                            <a href="index.php?ctrl=Adminusers&action=delete&id=<?= ($user['id']) ?>"
                               class="px-4 py-2 bg-red-500 text-white rounded-md text-sm shadow-md hover:bg-red-600">
                                Supprimer
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-gray-500 text-center mt-8">Aucun utilisateur enregistré pour le moment.</p>
        <?php endif; ?>
    </div>

<?php require 'views/admin/inc/footer.php'; ?>