<?php
session_start();
?>
<body>

<?php if (isset($_SESSION["success"])) :?>
    <p class="text-center form-text alert alert-success">Votre promotion a été créée avec succès</p>
<?php
    $_SESSION["success"] = null;
endif;?>
<?php if (isset($_SESSION["successSanction"])) :?>
    <p class="text-center form-text alert alert-success">Votre sanction a été créée avec succès</p>
<?php
    $_SESSION["successSanction"] = null;
endif;?>

<h1 class="text-center mt-5"> Bienvenue sur le site des sanctions du lycée Gaudper</h1>
<p class="text-center mt-5">Ce site a pour but de gérer les sanctions des élèves.</p>
<p class="text-center mt-5">Veuillez vous connecter pour accéder à la liste des sanctions</p>
<!--<a href="index.php?route=livre-list">Liste des livres</a> -->
</body>
