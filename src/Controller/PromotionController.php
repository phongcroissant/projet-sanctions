<?php

namespace App\Controller;

use App\UserStory\CreatePromotion;
use Doctrine\ORM\EntityManager;

class PromotionController extends AbstractController
{
    protected EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        session_start();
        $this->entityManager = $entityManager;
    }
    public function createPromotion(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['promotion'];
            $annee = $_POST['annee'];

            try {
                // Tenter de créer une promotion
                $user = new CreatePromotion($this->entityManager);
                $user->execute($libelle,intval($annee));
                $_SESSION["success"]="1";
                $this->redirect('/');
            } catch (\Exception $e) {
                $erreurs="";
                $erreurs = $e->getMessage();
            }

        }
        $this->render('promotion/creationPromotion', ['erreurs' => $erreurs ?? null,]);
    }
}
