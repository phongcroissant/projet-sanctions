<?php

namespace App\Controller;

class MentionsLegales
{
    public function mentionsLegales() {
        //Fait appel à la vue afin de renvoyer la page
        require_once __DIR__ . "/../../views/_partials/header.php";
        require_once __DIR__ . "/../../views/mentionslegales.php";
        require_once __DIR__ . "/../../views/_partials/footer.php";
    }
}