<?php

namespace App\UserStory;

class Accueil
{
    // Méthode permettant de gérer la page d'accueil
    public function accueil() {
        // Fait appel au modèle afin de récupérer les données de la BD

        //Fait appel à la vue afin de renvoyer la page
        require_once __DIR__ . "/../../views/accueil/accueil.php";
    }
}