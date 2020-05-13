<?php
namespace App;

use App\Command\ImportCars;

require __DIR__ . '/vendor/autoload.php';

$importCarsClass = new ImportCars;

echo 'Executing Import Cars'.PHP_EOL;
$importCarsClass->execute();
echo 'Executing Import Cars finished'.PHP_EOL;
