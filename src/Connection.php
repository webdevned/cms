<?php

namespace App;

class Connection {
    public function getConnection() {
        $servername = "localhost";
        $username = "nedas.grigaliunas";
        $password = "";

        try {
            $conn = new \PDO("mysql:host=$servername;dbname=cms", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully";

            return $conn;
        } catch(\PDOException $e) {
//            echo "Connection failed: " . $e->getMessage();
        }
    }
}