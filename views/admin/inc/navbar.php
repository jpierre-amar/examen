<nav class="bg-nav text-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-3">
            <!-- Logo ou Titre -->
            <a href="index.php?ctrl=AdminHome&action=index" class="text-2xl font-bold">Baby Tracker - Administration</a>

            <!-- Bouton pour mobile -->
            <button class="block md:hidden text-white focus:outline-none" id="navbar-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Liens de navigation -->
            <div class="hidden md:flex flex-1 items-center" id="navbar-links">
                <div class="flex flex-1 space-x-4 ml-10">
                    <a href="index.php?ctrl=AdminHome&action=index" class="block px-2 py-1 hover:text-gray-300">Accueil</a>
                    <a href="index.php?ctrl=AdminUsers&action=index" class="block px-2 py-1 hover:text-gray-300">Utilisateurs</a>
                    <a href="index.php?ctrl=AdminUsers&action=index&role=admin" class="block px-2 py-1 hover:text-gray-300">Administrateurs</a>
                </div>

                <div class="ml-auto">
                    <a href="index.php?ctrl=Home&action=index" class="block px-2 py-1 hover:text-gray-300">Retour à Baby tracker</a>
                    <a href="index.php?ctrl=Auth&action=logout" class="block px-2 py-1 hover:text-gray-300">Se déconnecter</a>
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
            navbarLinks.classList.toggle('hidden');
            navbarLinks.classList.toggle('flex');
            navbarLinks.classList.toggle('flex-col');
            navbarLinks.classList.toggle('space-y-2');
        });
    });
</script>
