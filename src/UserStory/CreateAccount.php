<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateAccount
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(string $nom,string $prenom, string $email, string $password, string $confirmPassword) : User
    {
        // Vérifier que des données sont présentes
        if (empty($nom)||empty($prenom) || empty($email) || empty($password) || empty($confirmPassword)) {
            throw new \Exception("Veuillez remplir les champs obligatoires.");
        }

        // Vérifier si l'email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("L'adresse email n'est pas valide.");
        }

        // Vérifier si le mot de passe est sécurisé
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            throw new \Exception("Le mot de passe doit faire au moins 8 caractères, incluant une lettre majuscule et un chiffre.");
        }

        // Vérifier l'unicité de l'email
        if ($this->entityManager->getRepository(User::class)->findOneBy(['email' => $email])) {
            throw new \Exception("L'email est déjà utilisé.");
        }
        if($password !== $confirmPassword) {
            throw new \Exception("Les mots de passe ne correspondent pas.");
        }
        // Mettre en majuscule le nom de famille
        $nom=strtoupper($nom);

        // Mettre en majuscule la première lettre du prénom
        if (strpos($prenom,"-")) {
            $prenom =mb_convert_case($prenom, MB_CASE_TITLE);
        } elseif (strpos($prenom," ")) {
            $prenom = ucwords(strtolower($prenom));
        }
        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Créer une instance de la classe User avec l'email, le pseudo et le mot de passe haché
        $user = new User();
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);

        // Persister l'instance en utilisant l'entity manager
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}