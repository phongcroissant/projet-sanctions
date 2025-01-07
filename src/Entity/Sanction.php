<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'sanctions')]
class Sanction
{
     #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column(name:'id_sanction',type:'integer')]
    protected int $id;


    #[ORM\ManyToOne(targetEntity: Eleve::class)]
    #[ORM\JoinColumn(name: 'id_eleve',referencedColumnName: 'id_eleve', nullable: false)]

    private Eleve $eleve;


    #[ORM\Column(type:"string", length:255)]

    private string $demandeur;


    #[ORM\ManyToOne(targetEntity: Motif::class)]
    #[ORM\JoinColumn(name: 'id_motif',referencedColumnName: 'id', nullable: false)]

    private ?Motif $motif;

     #[ORM\Column(type:"string", length:255, nullable:true)]

    private ?string $descriptionMotif;


     #[ORM\Column(type:"datetime")]

    private \DateTime $dateIncident;


    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_user',referencedColumnName: 'id_user', nullable: false)]

    private ?User $creePar;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEleve(): Eleve
    {
        return $this->eleve;
    }

    public function setEleve(Eleve $eleve): void
    {
        $this->eleve = $eleve;
    }

    public function getDemandeur(): string
    {
        return $this->demandeur;
    }

    public function setDemandeur(string $demandeur): void
    {
        $this->demandeur = $demandeur;
    }

    public function getMotif(): ?Motif
    {
        return $this->motif;
    }

    public function setMotif(?Motif $motif): void
    {
        $this->motif = $motif;
    }

    public function getDescriptionMotif(): ?string
    {
        return $this->descriptionMotif;
    }

    public function setDescriptionMotif(?string $descriptionMotif): void
    {
        $this->descriptionMotif = $descriptionMotif;
    }

    public function getDateIncident(): \DateTime
    {
        return $this->dateIncident;
    }

    public function setDateIncident(\DateTime $dateIncident): void
    {
        $this->dateIncident = $dateIncident;
    }

    public function getCreePar(): ?User
    {
        return $this->creePar;
    }

    public function setCreePar(?User $creePar): void
    {
        $this->creePar = $creePar;
    }







}
