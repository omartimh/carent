<?php
    require_once '../libraries/database.php';

    class User {
        private $db;

        public function __construct()
        {
            // SINGELTON DATABASE CONNECTION
            $dbh = Database::dbInstance();
            $conn = $dbh->dbConnection();
            $this->db = $conn;
        }

        public function getUser($email) {
            $sql = "SELECT * FROM users WHERE email = '$email';";
            $result = mysqli_query($this->db, $sql) or die("SQL_ERROR: getUser");
            $user = mysqli_fetch_assoc($result);
            return $user;
        }

        public function createUser($name, $email, $password) {
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password');";
            mysqli_query($this->db, $sql) or die("SQL_ERROR: createUser");
            return;
        }
    }
?>