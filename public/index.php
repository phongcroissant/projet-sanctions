<?php

use App\Controller\InscriptionController;
use App\UserStory\Accueil;
use App\UserStory\Connexion;
use App\UserStory\Inscription;

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
        $connexion= new \App\Controller\ConnexionController();
        $connexion->connexion();
        break;
}
