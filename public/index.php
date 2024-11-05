<?php

use App\UserStory\Accueil;
use App\UserStory\Inscription;

require_once __DIR__ . "/../vendor/autoload.php";

$route= $_GET["route"] ?? "accueil";
switch ($route) {
    case "accueil":
        $accueil= new Accueil();
        $accueil->accueil();
        break;
    case "inscription":
        $inscription=new Inscription();
        $inscription->inscription();
}
