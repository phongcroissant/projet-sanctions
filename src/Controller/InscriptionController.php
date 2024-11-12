<?php

namespace App\Controller;

use App\Entity\User;
use App\UserStory\CreateAccount;
class InscriptionController
{
    public function inscription() {
        $entityManager=require_once __DIR__."/../../config/bootstrap.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password =$_POST['password'];
            $confirmPassword =$_POST['confirmpassword'];

            try {
                // Tenter de créer un compte
                $user = new CreateAccount($entityManager);
                $user->execute($nom,$prenom, $email, $password, $confirmPassword);
            } catch (\Exception $e) {
                $erreurs="";
                $erreurs = $e->getMessage();
            }
        }
        //Fait appel à la vue afin de renvoyer la page
        require_once __DIR__ . "/../../views/_partials/header.php";
        require_once __DIR__ . "/../../views/inscription.php";
        require_once __DIR__ . "/../../views/_partials/footer.php";

    }
}