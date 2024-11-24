<?php

namespace App\Controller;

use Doctrine\ORM\Query\Expr\Base;

class Accueil extends AbstractController
{
    public function index(): void
    {
        $this->render('home/accueil');
    }

    public function legal(): void
    {
        $this->render('home/mentionslegales');
    }
}