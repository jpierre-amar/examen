<nav class="bg-nav text-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-3">
            <!-- Logo ou Titre -->
            <a href="index.php?ctrl=Home&action=index" class="text-2xl font-bold">Baby Tracker</a>

            <!-- Bouton pour mobile -->
            <button class="block md:hidden text-white focus:outline-none" id="navbar-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Liens de navigation -->
            <div class="hidden flex-col md:flex md:flex-row md:space-x-12 md:items-center w-full md:w-auto" id="navbar-links">
                <a href="index.php?ctrl=Home&action=index" class="block px-4 py-2 hover:text-gray-300 text-center md:text-left">Accueil</a>
                <a href="index.php?ctrl=Baby&action=index" class="block px-4 py-2 hover:text-gray-300 text-center md:text-left">Mes bébés</a>
                <a href="/statistics" class="block px-4 py-2 hover:text-gray-300 text-center md:text-left">Statistiques</a>
                <a href="/settings" class="block px-4 py-2 hover:text-gray-300 text-center md:text-left">Paramètres</a>

                <!-- Bouton à droite -->
                <div class="mt-4 md:mt-0 md:ml-auto">
                    <?php if (!isset($_SESSION['user_email'])): ?>
                        <a href="index.php?ctrl=Auth&action=showLoginForm" class="block px-4 py-2 hover:text-gray-300 text-center md:text-left">Se connecter / S'inscrire</a>
                    <?php else: ?>
                        <a href="index.php?ctrl=Auth&action=logout" class="block px-4 py-2 hover:text-gray-300 text-center md:text-left">Se déconnecter</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('navbar-toggle');
        const navbarLinks = document.getElementById('navbar-links');

        toggle.addEventListener('click', function () {
            navbarLinks.classList.toggle('hidden'); // Cache ou affiche le menu
            navbarLinks.classList.toggle('flex');  // Active flex pour l'affichage
        });
    });
</script>