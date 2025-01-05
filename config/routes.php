<?php
return [
    '/' => ['AccueilController', 'index'],
    '/inscription' => ['AuthentificationController', 'inscription'],
    '/connexion' => ['AuthentificationController', 'connexion'],
    '/legal' => ['AccueilController', 'legal'],
    '/deconnexion' => ['AuthentificationController', 'deconnexion'],
    '/createPromotion' => ['PromotionController', 'createPromotion'],
    '/importEleve'=>['EleveController', 'importEleve'],
    '/createSanction'=>['SanctionController', 'createSanction'],
];