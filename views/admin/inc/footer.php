<?php
// Inclusion du pied de page partagé
?>
<footer>
    <p>&copy; 2025 Baby Tracker. Tous droits réservés.</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('navbar-toggle');
    const navbarLinks = document.getElementById('navbar-links');
    console.log(toggle);

    toggle.addEventListener('click', function () {
        navbarLinks.classList.toggle('hidden');
        navbarLinks.classList.toggle('flex');
        navbarLinks.classList.toggle('flex-col');
        navbarLinks.classList.toggle('space-y-2');
    });
    });
</script>
</body>
</html>
