<?php
namespace App;

use App\Command\ImportCars;

require __DIR__ . '/vendor/autoload.php';

$importCarsClass = new ImportCars;

echo 'Executing Import Cars'.PHP_EOL;
$importCarsClass->execute();
echo 'Executing Import Cars finished'.PHP_EOL;

use App\Command\ImportUsers;

$importUsersClass = new ImportUsers();

echo 'Executing Import Users'.PHP_EOL;
$importUsersClass->execute();
echo 'Executing Import Users finished'.PHP_EOL;


use App\Command\ImportAnimals;

$importAnimalsClass = new ImportAnimals();

echo 'Executing Import Animals'.PHP_EOL;
$importAnimalsClass->execute();
echo 'Executing Import Animals finished'.PHP_EOL;
