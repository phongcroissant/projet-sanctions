<?php

use App\Entity\Promotion;
require_once __DIR__. '/../vendor/autoload.php';
$entityManager=require_once("./config/bootstrap.php");

$promos=$entityManager->getRepository(Promotion::class)->findAll();
print_r($promos);
foreach ($promos as $promo) {
    echo $promo->getLibelle();
}
$id=$entityManager->getRepository(Promotion::class)->findOneBy("");