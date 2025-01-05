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

                $message = "$nbEleves étudiant(s) ont bien été créés !";

            } catch (\Exception $e) {
                $erreurs = $e->getMessage();
            }
        }

        $promotions = $this->entityManager->getRepository(Promotion::class)->findBy([]);

        $this->render('eleve/importerEleve', [
            'erreurs' => $erreurs,
            'message' => $message ?? null,
            'promotions' => $promotions
        ]);
    }

}