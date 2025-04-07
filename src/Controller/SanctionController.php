<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Motif;
use App\Entity\Promotion;
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
        $success = null;

        // 1. Récupération de la promotion sélectionnée (en GET pour le filtre ou POST pour la soumission)
        $promotionId = $_GET['promotion'] ?? $_POST['promotion'] ?? null;

        // 2. Si le formulaire principal est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eleve'])) {
            $eleveId = $_POST['eleve'] ?? null;
            $motifId = $_POST['motif'] ?? null;
            $descriptionMotif = $_POST['descriptionMotif'] ?? null;
            $dateIncident = $_POST['dateIncident'] ?? null;
            $demandeur = $_POST['demandeur'] ?? null;
            $creePar = $_SESSION['utilisateur']['id'];

            try {
                $sanctionService = new CreateSanction($this->entityManager);
                $sanctionService->execute($eleveId, $motifId, $descriptionMotif, $dateIncident, $demandeur, $creePar);
                $_SESSION['successSanction'] = "La sanction a été créée avec succès.";
                $this->redirect('/'); // Redirection vers la page d'accueil ou une autre page
            } catch (\Exception $e) {
                $erreurs[] = $e->getMessage();
            }
        }

        // 3. Récupération des promotions
        $promotions = $this->entityManager->getRepository(Promotion::class)->findBy([]);

        // 4. Récupération des élèves, filtrés si une promotion est sélectionnée
        $eleves = [];
        if ($promotionId) {
            $eleves = $this->entityManager->getRepository(Eleve::class)->findBy([
                'idPromotion' => $promotionId
            ]);
        }

        // 5. Récupération des motifs
        $motifs = $this->entityManager->getRepository(Motif::class)->findBy([]);

        // 6. Affichage du formulaire
        $this->render('sanctions/creationSanction', [
            'erreurs' => $erreurs,
            'eleves' => $eleves,
            'motifs' => $motifs,
            'promotions' => $promotions,
            'promotionId' => $promotionId, // Pour garder la sélection
        ]);
    }



}
