<?php

namespace App\Entity;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'promotions')]
class Promotion
{
    #[ORM\Id]
    #[ORM\Column(name:'id_promotion', type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;
    #[ORM\Column(name: 'libelle', type: 'string', length: 50)]
    protected string $libelle;

    #[ORM\Column(name: 'annee', type: 'integer')]
    protected int $annee;

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    public function getAnnee(): int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): void
    {
        $this->annee = $annee;
    }

}

