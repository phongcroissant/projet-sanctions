<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'promotions')]
class Promotion
{
    #[ORM\Id]
    #[ORM\Column(name:'id_user', type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(name: 'nom', type: 'string', length: 50)]
    protected string $nom;
    #[ORM\Column(name: 'prenom', type: 'string', length: 50)]
    protected string $prenom;

    #[ORM\Column(name: 'email_user', type: 'string', length: 100, unique: true)]
    protected string $email;

    #[ORM\Column(name: 'password_user', type: 'string')]
    protected string $password;
}