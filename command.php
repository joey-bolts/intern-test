<?php
namespace App;

use App\Command\ImportCars;

require __DIR__ . '/vendor/autoload.php';

$importCarsClass = new ImportCars;

echo 'Executing Import Cars'.PHP_EOL;
$importCarsClass->execute();
echo 'Executing Import Cars finished'.PHP_EOL;

use App\Command\ImportUsers;

require __DIR__ . '/vendor/autoload.php';

$importUsersClass = new ImportUsers();

echo 'Executing Import Users'.PHP_EOL;
$importUsersClass->execute();
echo 'Executing Import Users finished'.PHP_EOL;


use App\Command\importAnimals;

require __DIR__ . '/vendor/autoload.php';

$xlsx = new SimpleXLSX('animals.xlsx'); // try...catch
if ( $xlsx->success() ) {
    print_r( $xlsx->rows() );
} else {
    echo 'xlsx error: '.$xlsx->error();
}