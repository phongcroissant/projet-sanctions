<?php

namespace App\Controller;

class ConnexionController
{
    public function connexion() {
        // Fait appel au modèle afin de récupérer les données de la BD

        //Fait appel à la vue afin de renvoyer la page
        require_once __DIR__ . "/../../views/_partials/header.php";
        require_once __DIR__ . "/../../views/connexion.php";
        require_once __DIR__ . "/../../views/_partials/footer.php";
    }
}