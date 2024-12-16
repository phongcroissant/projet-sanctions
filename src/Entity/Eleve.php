<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: 'eleves')]
class Eleve
{
    #[ORM\Id]
    #[ORM\Column(name:'id_eleve', type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(name: 'nom', type: 'string', length: 50)]
    protected string $nom;
    #[ORM\Column(name: 'prenom', type: 'string', length: 50)]
    protected string $prenom;

    #[ORM\Column(name:'id_promotion', type: 'integer')]
    #[ORM\ManyToOne(targetEntity: 'Promotion')]
    #[ORM\JoinColumn(referencedColumnName: 'id_promotion', nullable: false)]
    protected int $idPromotion;
}