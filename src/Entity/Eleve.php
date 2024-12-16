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

    #[ORM\ManyToOne(targetEntity: Promotion::class)]
    #[ORM\JoinColumn(name: 'id_promotion',referencedColumnName: 'id_promotion', nullable: false)]
    protected Promotion $idPromotion;
}