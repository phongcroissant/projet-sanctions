<?php

namespace App\UserStory;

use App\Entity\Eleve;
use App\Entity\Motif;
use App\Entity\Sanction;
use Doctrine\ORM\EntityManager;

class CreateSanction
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function execute(
        ?int $eleveId,
        ?int $motifId,
        string $descriptionMotif,
        string $dateIncident,
        string $demandeur,
        string $creePar
    ): Sanction {
        if (empty($eleveId) || empty($descriptionMotif) || empty($dateIncident) || empty($demandeur)) {
            throw new \Exception("Tous les champs sont obligatoires.");
        }

        $eleve = $this->entityManager->getRepository(Eleve::class)->find($eleveId);
        if (!$eleve) {
            throw new \Exception("L'élève sélectionné est introuvable.");
        }

        $motif = $motifId
            ? $this->entityManager->getRepository(Motif::class)->find($motifId)
            : null;

        $sanction = new Sanction();
        $sanction->setEleve($eleve);
        $sanction->setMotif($motif);
        $sanction->setDescriptionMotif($descriptionMotif);
        $sanction->setDateIncident(new \DateTime($dateIncident));
        $sanction->setDemandeur($demandeur);
        $sanction->setCreePar($creePar);

        $this->entityManager->persist($sanction);
        $this->entityManager->flush();

        return $sanction;
    }

}