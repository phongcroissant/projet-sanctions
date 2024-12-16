<?php

namespace App\Controller;

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
        if (isset($_POST["listeEleve"])) {
            try {
                $csv = Reader::createFromPath($_FILES['listeEleve']['tmp_name'], 'r');
                $csv->setHeaderOffset(0);
                $tableau=iterator_to_array($csv,true);

            } catch (\Exception $e) {
                $erreurs=$e->getMessage();
            }
        }
        $this->render('eleve/importerEleve');

    }
}