<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Motif;
use App\Entity\Sanction;
use App\UserStory\CreateSanction;
use Doctrine\ORM\EntityManager;

class SanctionController extends AbstractController
{
    private EntityManager $entityManager;

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

    public function createSanction(): void
    {
        $erreurs = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $eleveId = $_POST['eleve'] ?? null;
            $motifId = $_POST['motif'] ?? null;
            $descriptionMotif = $_POST['descriptionMotif'] ?? null;
            $dateIncident = $_POST['dateIncident'] ?? null;
            $demandeur = $_POST['demandeur'] ?? null;
            $creePar = $_SESSION['utilisateur']["id"]; // Récupération de l'ID de l'utilisateur courant

            try {
                $sanctionService = new CreateSanction($this->entityManager);
                $sanctionService->execute($eleveId, $motifId, $descriptionMotif, $dateIncident, $demandeur, $creePar);
                $_SESSION["successSanction"] = "La sanction a été créée avec succès.";
                $this->redirect('/');
            } catch (\Exception $e) {
                $erreurs[] = $e->getMessage();
            }
        }

        $eleves = $this->entityManager->getRepository(Eleve::class)->findBy([]);
        $motifs = $this->entityManager->getRepository(Motif::class)->findBy([]);

        $this->render('sanctions/creationSanction', [
            'erreurs' => $erreurs ?? null,
            'eleves' => $eleves,
            'motifs' => $motifs,
        ]);
    }

}
