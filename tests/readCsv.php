<?php
use League\Csv\Reader;

require_once __DIR__ . "/../vendor/autoload.php";

//load the CSV document from a file path
$csv = Reader::createFromPath($_FILES['listeEleve']['tmp_name'], 'r');
$csv->setHeaderOffset(0);
$test=iterator_to_array($csv,true);
print_r($test);