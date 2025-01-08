<main class="bg-gray-100 flex items-center justify-center mt-12 mb-20">
<div class="bg-white shadow-lg rounded-lg p-8 max-w-md text-center">
    <h1 class="text-3xl font-bold text-center my-6">Bienvenue sur Baby Tracker</h1>
    <p class="text-center text-lg text-gray-700 mt-4 mb-12">
        Baby Tracker est votre compagnon idéal pour suivre les activités, les progrès et les besoins de vos enfants.
        Simplifiez votre quotidien en enregistrant les repas, les siestes, les changements de couches, et bien plus qui arrivent prochainement !
    </p>
<?php if (isset($_SESSION['user_id'])): ?>
    <p class="text-center text-lg">Vous êtes connecté</p>
    <a href="index.php?ctrl=Baby&action=index" class="text-blue-500 hover:text-blue-700 underline">Voir mes bébés</a>
<?php else: ?>
    <div class="text-center mt-6">
        <p class="text-lg mb-4">Veuillez vous connecter pour continuer</p>
        <a href="index.php?ctrl=Auth&action=showLoginForm"
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-200">
            Se connecter
        </a>
    </div>
<?php endif; ?>
<!--    --><?php //dump($_SESSION, "SESSION"); ?>
</div>
</main>
