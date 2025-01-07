<?php

namespace App\UserStory;

use App\Entity\Eleve;
use App\Entity\Motif;
use App\Entity\Sanction;
use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateSanction
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function execute($eleveId, $motifId, $descriptionMotif, $dateIncident, $demandeur, $creeParId): void
    {
        if (empty($eleveId) || empty($descriptionMotif) || empty($dateIncident) || empty($demandeur) || empty($motifId)) {
            throw new \Exception("Tous les champs sont obligatoires.");
        }

        // Récupération des entités nécessaires
        $eleve = $this->entityManager->getRepository(Eleve::class)->find($eleveId);
        $motif = $motifId ? $this->entityManager->getRepository(Motif::class)->find($motifId) : null;
        $creePar = $this->entityManager->getRepository(User::class)->find($creeParId);

        // Validation des entités récupérées
        if (!$eleve) {
            throw new \Exception("L'élève sélectionné n'existe pas.");
        }

        if ($motifId && !$motif) {
            throw new \Exception("Le motif sélectionné n'existe pas.");
        }

        if (!$creePar) {
            throw new \Exception("L'utilisateur créateur de la sanction est introuvable.");
        }

        // Création de la sanction
        $sanction = new Sanction();
        $sanction->setEleve($eleve);
        $sanction->setMotif($motif);
        $sanction->setDescriptionMotif($descriptionMotif);
        $sanction->setDateIncident(new \DateTime($dateIncident));
        $sanction->setDemandeur($demandeur);
        $sanction->setCreePar($creePar); // Utilisation de l'entité User

        // Persistance et sauvegarde
        $this->entityManager->persist($sanction);
        $this->entityManager->flush();
    }


}