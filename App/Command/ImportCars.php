<?php

namespace App\Command;


use App\Connector\Connection;

class ImportCars
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var string
     */
    protected $fileName = 'exampleCars.csv';

    /**
     * Import constructor.
     */
    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    /**
     * only function that should be called externally
     */
    public function execute(): void
    {
        $csv = file_get_contents(__DIR__ . '/../Files/' . $this->fileName);
        $this->insertCarsIntoDatabase($csv);
    }

    /**
     * @param $csv
     * Parse cars from .csv and insert into database.
     */
    private function insertCarsIntoDatabase($csv)
    {
        $connection = Connection::getConnection();

        $data = str_getcsv($csv, "\n");

        foreach ($data as $index => $dataRow) {
            //skip first row
            if ($index > 0) {
                $dataRow = explode(",", $dataRow);
                $dataArray = [
                    'car_make' => $dataRow[0],
                    'car_model' => $dataRow[1],
                    'car_model_year' => $dataRow[2],
                ];
                $carList[$index] = $dataArray;
            }
        }

        foreach ($carList as $car) {
            //Prepare statement
            $sql = "INSERT INTO `cars` (`car_make`, `car_model`, `car_model_year`) VALUES (?,?,?)";

            $statement = $connection->prepare($sql);

            //Bind parameters
            $statement->bindParam(1, $car['car_make']);
            $statement->bindParam(2, $car['car_model']);
            $statement->bindParam(3, $car['car_model_year']);
            $statement->execute();
        }
    }
}
