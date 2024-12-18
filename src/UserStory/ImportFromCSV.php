<?php

namespace App\UserStory;

use App\Entity\Promotion;
use App\Entity\User;
use Doctrine\ORM\EntityManager;

class ImportFromCSV
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function afficherPromotion(): array
    {
        return $this->entityManager->getRepository(Promotion::class)->findAll();
    }

    public function execute(string $tableau,int $idPromotion) {

    }
}