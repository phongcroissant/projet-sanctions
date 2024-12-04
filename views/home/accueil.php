<?php
session_start();
?>
<body>

<?php if (isset($_SESSION["success"])) :?>
    <p class="text-center form-text alert alert-success">Votre promotion a été crée avec succès</p>
<?php
    $_SESSION["success"] = null;
endif;?>

<h1 class="text-center mt-5"> Bienvenue sur le site des sanctions du lycée Gaudper</h1>
<p class="text-center mt-5">Ce site a pour but de gérer les sanctions des élèves.</p>
<p class="text-center mt-5">Veuillez vous connecter pour accéder à la liste des sanctions</p>
<!--<a href="index.php?route=livre-list">Liste des livres</a> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
