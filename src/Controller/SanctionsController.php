<?php

namespace App\Controller;

use App\UserStory\CreateAccount;

class SanctionsController extends AbstractController
{
    private array $sanctions = [];
    public function __construct()
    {

        // Simuler une base de données avec une session
        session_start();
        if (!isset($_SESSION['sanctions'])) {
            $_SESSION['sanctions'] = [];
        }
        $this->sanctions = &$_SESSION['sanctions'];
    }
    public function index(): void
    {
        $this->render('sanctions/index', [
            'sanctions' => $this->sanctions
        ]);
    }
    public function inscription(): void
    {
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
        $this->render('Sanctions/inscription');
    }
}