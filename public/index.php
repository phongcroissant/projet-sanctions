<?php

use App\Controller\Accueil;
use App\Controller\ConnexionController;
use App\Controller\InscriptionController;
use App\Controller\MentionsLegales;

require_once __DIR__ . "/../vendor/autoload.php";

$route= $_GET["route"] ?? "accueil";
switch ($route) {
    case "accueil":
        $accueil= new Accueil();
        $accueil->accueil();
        break;
    case "inscription":
        $inscription=new InscriptionController();
        $inscription->inscription();
        break;
    case "connexion":
        $connexion=new ConnexionController();
        $connexion->connexion();
        break;
    case"mentionslegales":
        $mentionslegales=new MentionsLegales();
        $mentionslegales->mentionsLegales();
        break;
}
