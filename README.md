# A simple test for new/future interns.

The goal of this test is that we can check if you have a basic understanding of coding.

In this project you will find the following Files/Classes.


```
commands.php
______________________________________________________
You can call this class in the terminal with the command below and it will run.
php command.php
```

```
App/Command/ImportCars.php
______________________________________________________
This class serves as an example class which imports all the car data from exampleCars.csv
```

```
App/Connector/Connection.php
______________________________________________________
This class is able to return a connection to your database, make the following variables correct.
$serverName
$databaseName
$userName
$password
```

```
App/Files/exampleCars.csv
______________________________________________________
This file contains data for example import
```

```
App/Files/users.csv
______________________________________________________
This file needed for the assignment 1
```

```
App/Files/animals.xlsx
______________________________________________________
This file needed for the assignment 2
```

```
.gitignore
______________________________________________________
This avoids commiting unneeded files
```

```
.intern_test.sql
______________________________________________________
Tthis contains the example database
```

##### Setup the enviroment.

* Install php if not yet done so
`https://www.sitepoint.com/how-to-install-php-on-windows/`

* Install composer.

`https://getcomposer.org/doc/00-intro.md`

* Import the database file, we should be able to expect from you how to do this.

`intern_test.sql`

* Make sure $serverName, $databaseName, $userName, $password are set correct in Connection.php.

* run `composer install` from your terminal in the root of the project.

* run `php commands.php` in the root of your project. If everything is done correctly you should have 1000 cars in your database.

##### Notes
* Your allowed to create as many files as you want.
* Make sure you don't put any private info in.

### Assignment 1
With all the example code you should be able to make a new table in the database called users. These users all have to be imported in the database. This also has to be done by calling `php command.php`

Use the example code and make sure not the break the other import.

### Assignment 2
Import `animals.xlsx` using `https://github.com/shuchkin/simplexlsx` this is a composer package.

Install it using the following command. `composer require shuchkin/simplexlsx`
If you can't get this to work, try to get a .csv file from animals.xlsx and import it the same way as you did at **Assignment 1**

#### Complete
* You can call this assignment complete when all imports work when calling `php commands.php`

### Deliverables
* Compile this project as a zip and mail it to your contactperson.

### Bonus points
Make a pull request with your solution on this github repository.
