<?php

namespace App\UserStory;

use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;

class CreatePromotion
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(string $libelle,int $annee) : Promotion
    {
        // Vérifier que des données sont présentes
        if (empty($libelle)||empty($annee)) {
            throw new \Exception("Veuillez remplir les champs obligatoires.");
        }

        // Vérifier l'unicité de les promotions
        if ($this->entityManager->getRepository(Promotion::class)->findOneBy(['libelle' => $libelle]) &&
            $this->entityManager->getRepository(Promotion::class)->findOneBy(['annee' => $annee])) {
            throw new \Exception("La promotion existe déjà");
        }

        // Créer une instance de la classe Promotion avec le libellé et l'année
        $promotion = new Promotion();
        $promotion->setLibelle($libelle);
        $promotion->setAnnee($annee);

        // Persister l'instance en utilisant l'entity manager
        $this->entityManager->persist($promotion);
        $this->entityManager->flush();

        return $promotion;
    }
}