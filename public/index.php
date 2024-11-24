<?php

use App\Controller\ConnexionController;
use App\Controller\InscriptionController;
use App\Controller\Accueil;

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
        $connexion= new ConnexionController();
        $connexion->connexion();
        break;
    case "mentionslegales":
        $mentions=new \App\Controller\MentionsLegales();
        $mentions->mentionsLegales();
}
