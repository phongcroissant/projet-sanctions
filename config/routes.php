<?php
return [
    '/' => ['AccueilController', 'index'],
    '/sanctions' => ['AuthentificationController', 'index'],
    '/inscription' => ['AuthentificationController', 'inscription'],
    '/connexion' => ['AuthentificationController', 'connexion'],
    '/legal' => ['AccueilController', 'legal'],
    '/deconnexion' => ['AuthentificationController', 'deconnexion'],
];