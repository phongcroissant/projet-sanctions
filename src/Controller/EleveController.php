<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Promotion;
use App\UserStory\ImportFromCSV;
use Doctrine\ORM\EntityManager;
use League\Csv\Reader;

class EleveController extends AbstractController
{
    protected EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        session_start();
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['utilisateur'])) {
            $this->redirect('/connexion');
            exit;
        }
        $this->entityManager = $entityManager;
    }
    public function importEleve(): void
    {
        $erreurs = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $csv = $_FILES['listeEleve']['tmp_name'] ?? null;
            $classe = $_POST['promotions'] ?? null;

            try {
                if (empty($csv) || empty($classe)) {
                    throw new \Exception("Tous les champs sont obligatoires !");
                }

                $eleve = new ImportFromCSV($this->entityManager);
                $nbEleves = $eleve->execute($csv, $classe);

            } catch (\Exception $e) {
                $erreurs = $e->getMessage();
            }
        }

        $promotions = $this->entityManager->getRepository(Promotion::class)->findBy([]);

        $this->render('eleve/importerEleve', [
            'erreurs' => $erreurs,
            'nbEleve' => $nbEleves ?? null,
            'promotions' => $promotions
        ]);
    }

}