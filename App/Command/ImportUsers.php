<?php

namespace App\Command;


use App\Connector\Connection;

class ImportUsers
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var string
     */
    protected $fileName = 'users.csv';

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
        $this->insertUsersIntoDatabase($csv);
    }

    /**
     * @param $csv
     * Parse users from .csv and insert into database.
     */
    private function insertUsersIntoDatabase($csv)
    {
        $connection = Connection::getConnection();

        $data = str_getcsv($csv, "\n");

        foreach ($data as $index => $dataRow) {
            //skip first row
            if ($index > 0) {
                $dataRow = explode(",", $dataRow);
                $dataArray = [
                    'username' => $dataRow[0],
                    'email' => $dataRow[1],
                    'file_name' => $dataRow[2],
                ];
                $usersList[$index] = $dataArray;
            }
        }

        foreach ($usersList as $users) {
            //Prepare statement
            $sql = "INSERT INTO `users` (`username`, `email`, `file_name`) VALUES (?,?,?)";

            $statement = $connection->prepare($sql);

            //Bind parameters
            $statement->bindParam(1, $users['username']);
            $statement->bindParam(2, $users['email']);
            $statement->bindParam(3, $users['file_name']);
            $statement->execute();
        }
    }
}
