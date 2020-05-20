<?php
namespace App;

use App\Command\ImportCars;
use App\Command\ImportUsers;
use App\Command\ImportAnimals;



require __DIR__ . '/vendor/autoload.php';

$importCarsClass = new ImportCars;

echo 'Executing Import Cars'.PHP_EOL;
$importCarsClass->execute();
echo 'Executing Import Cars finished'.PHP_EOL;

$importUsersClass = new ImportUsers;

echo 'Executing Import Users'.PHP_EOL;
$importUsersClass->execute();
echo 'Executing Import Users finished'.PHP_EOL;

$importAnimalsClass = new ImportAnimals;

echo 'Executing Import animals'.PHP_EOL;
$importAnimalsClass->execute();
echo 'Executing Import animals finished'.PHP_EOL;
