<?php
    require_once '../libraries/database.php';

    class Rental {
        private $db;

        public function __construct()
        {
            // SINGELTON DATABASE CONNECTION
            $dbh = Database::dbInstance();
            $conn = $dbh->dbConnection();
            $this->db = $conn;
        }

        public function setRentalCar($status, $name, $year, $transmission, $passengers, $doors, $dst_db) {
            $sql = "INSERT INTO cars (status, name, year, transmission, passengers, doors, image)
            VALUES ('$status', '$name', '$year', '$transmission', '$passengers', '$doors', '$dst_db');";
            mysqli_query($this->db, $sql) or die("SQL_ERROR: setRentalCar");
            return;
        }

        public function getRentalCars() {
            $carRentals = [];
            $sql = "SELECT * FROM cars WHERE isDeleted !='1';";
            $result = mysqli_query($this->db, $sql) or die("SQL_ERROR: getRentalCars");
            while ($row = mysqli_fetch_assoc($result))
            {
                $id[] = $row['id'];
                $status[] = $row['status'];
                $name[] = $row['name'];
                $year[] = $row['year'];
                $transmission[] = $row['transmission'];
                $passengers[] = $row['passengers'];
                $doors[] = $row['doors'];
                $image[] = $row['image'];
            }

            if (isset($id)) {
                for ($i = 0; $i < count($id); $i++)
                {
                    $carRentals[] = array($id[$i], $status[$i], $name[$i], $year[$i], $transmission[$i], $passengers[$i], $doors[$i], $image[$i]);
                }
            }
            return $carRentals;
        }

        public function setStatus($id, $status)
        {
            $sql = "UPDATE cars SET status='$status' WHERE id='$id';";
            mysqli_query($this->db, $sql) or die("SQL_ERROR: setStatus");
            return;
        }

        public function deleteCar($id) {
            $sql = "UPDATE cars SET isDeleted=1 WHERE id='$id';";
            mysqli_query($this->db, $sql) or die("SQL_ERROR: deleteCar");
            return;
        }
    }
?>