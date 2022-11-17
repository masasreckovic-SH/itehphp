<?php

class Employee
{
    public $id;
    public $companyid;
    public $name;
    public $position;
    public $year;
    public $nationality;

    public function __construct(
        $id,
        $companyid,
        $name,
        $position,
        $year,
        $nationality
    ) {
        $this->id = $id;
        $this->companyid = $companyid;
        $this->name = $name;
        $this->position = $position;
        $this->year = $year;
        $this->nationality = $nationality;
    }

    public function createEmployee()
    {
        $host = 'localhost';
        $user = 'admin';
        $password = 'admin';
        $database = 'employment';
        $conn = mysqli_connect($host, $user, $password, $database);

        $query = "INSERT INTO employee(companyid, name, position, year, nationality)
        VALUES('$this->companyid', '$this->name', '$this->position',
            '$this->year', '$this->nationality')";

        if (mysqli_query($conn, $query)) {
            header('Location: index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
