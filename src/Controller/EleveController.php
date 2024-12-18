<?php

namespace App\Controller;

use App\Entity\Eleve;
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
    public function importEleve()  {
        $promotions=new ImportFromCSV($this->entityManager);
;        if (isset($_POST["listeEleve"])) {
            try {
                $csv = Reader::createFromPath($_FILES['listeEleve']['tmp_name'], 'r');
                $csv->setHeaderOffset(0);
                $tableau=iterator_to_array($csv,true);
                $eleves=new ImportFromCSV($this->entityManager);
                $eleves->execute($tableau,$_POST["promotions"]);


            } catch (\Exception $e) {
                $erreurs=$e->getMessage();
            }
        }
        $this->render('eleve/importerEleve',['promotions' => $promotions ?? null,]);

    }
}