<?php

namespace App\Controller;

use App\UserStory\ConnectAccount;
use App\UserStory\CreateAccount;
use Doctrine\ORM\EntityManager;

class AuthentificationController extends AbstractController
{
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        session_start();
        // Vérifiez si l'utilisateur est connecté

        $this->entityManager=$entityManager;
    }

    public function inscription(): void
    {
        if (isset($_SESSION['utilisateur'])) {
            $this->redirect('/');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password =$_POST['password'];
            $confirmPassword =$_POST['confirmpassword'];

            try {
                // Tenter de créer un compte
                $user = new CreateAccount($this->entityManager);
                $user->execute($nom,$prenom, $email, $password, $confirmPassword);
                $_SESSION['success']="1";
                $this->redirect('/connexion');
            } catch (\Exception $e) {
                $erreurs="";
                $erreurs = $e->getMessage();
            }

        }
        $this->render('authentification/inscription', ['erreurs' => $erreurs ?? null,]);
    }
    public function connexion(): void {
        if (isset($_SESSION['utilisateur'])) {
            $this->redirect('/');
        }else{
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $erreurs = "";
                try {
                    $user= new ConnectAccount($this->entityManager);
                    $user->execute($_POST["email"],$_POST["password"]);
                }catch(\Exception $e){
                    $erreurs = $e->getMessage();
                }
                if ($erreurs==""){
                    $this->redirect("/");
                    exit();
                }
            }
        }
        $this->render('authentification/connexion', ['erreurs' => $erreurs ?? null,]);
    }
    public function deconnexion(): void {
        if (isset($_SESSION['utilisateur'])) {
            session_destroy();
            session_unset();
        }
        $this->redirect('/');
    }
}