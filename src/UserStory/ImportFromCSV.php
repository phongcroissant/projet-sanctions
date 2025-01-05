<?php

namespace App\UserStory;

use App\Entity\Eleve;
use League\Csv\Reader;
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

    public function execute(string $filePath, int $idPromotion): int
    {
        $repositoryPromotion = $this->entityManager->getRepository(Promotion::class);

        // Validation des entrées
        if (empty($filePath) || empty($idPromotion)) {
            throw new \Exception("Tous les champs sont obligatoires !");
        }

        $promotion = $repositoryPromotion->find($idPromotion);
        if (!$promotion) {
            throw new \Exception("La promotion sélectionnée n'a pas été trouvée !");
        }

        // Lecture du fichier CSV
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);
        $csv->setEscape('');

        $data = iterator_to_array($csv, true);

        $nbEleves = 0;

        foreach ($data as $etudiant) {
            if (empty($etudiant['Nom']) || empty($etudiant['Prénom'])) {
                throw new \Exception("Une ligne du fichier est invalide : Nom ou Prénom manquant.");
            }

            $eleve = new Eleve();
            $eleve->setNom($etudiant['Nom']);
            $eleve->setPrenom($etudiant['Prénom']);
            $eleve->setIdPromotion($promotion);

            $this->entityManager->persist($eleve);
            $nbEleves++;
        }

        // Enregistrement dans la base
        $this->entityManager->flush();

        return $nbEleves;
    }

}