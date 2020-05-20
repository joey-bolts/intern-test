<?php
namespace App\Command;
use App\Connector\Connection;
use SimpleXLSX;
class importAnimals
{
    /**
     * @var Connection
     */
    protected $connection;
    /**
     * @var string
     */
    protected $fileName = 'animals.xlsx';
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
        if ( $xlsx = SimpleXLSX::parse((__DIR__ . '/../Files/' . $this->fileName)) ) {
            $data = $xlsx->rows();
            $this->insertAnimalsIntoDatabase($data);
        } else {
            echo SimpleXLSX::parseError();
        }
    }
    /**
     * @param $data
     * Parse cars from .xlsx and insert into database.
     */
    private function insertAnimalsIntoDatabase($data)
    {

        $connection = Connection::getConnection();
        foreach ($data as $index => $dataRow) {
            //skip first row
            if ($index > 0) {
                $dataArray = [
                    'animal_common_name' => $dataRow[0],
                    'animal_scientific_name' => $dataRow[1],
                    'food_name' => $dataRow[2],
                ];
                $animalList[$index] = $dataArray;
            }
        }
        foreach ($animalList as $animal) {
            //Prepare statement
            $sql = "INSERT INTO `animals` (`animal_common_name`, `animal_scientific_name`, `food_name`) VALUES (?,?,?)";
            $statement = $connection->prepare($sql);
            //Bind parameters
            $statement->bindParam(1, $animal['animal_common_name']);
            $statement->bindParam(2, $animal['animal_scientific_name']);
            $statement->bindParam(3, $animal['food_name']);
            $statement->execute();
        }
    }
}

