<?php

namespace App\Controller;

class Accueil
{
    // Méthode permettant de gérer la page d'accueil
    public function accueil() {
        // Fait appel au modèle afin de récupérer les données de la BD

        //Fait appel à la vue afin de renvoyer la page
        require_once __DIR__ . "/../../views/_partials/header.php";
        require_once __DIR__ . "/../../views/accueil.php";
        require_once __DIR__ . "/../../views/_partials/footer.php";
    }
}