<?php

namespace Config {

    class Database
    {

        static function getConnection(): \PDO
        {
            $host = "localhost";
            $port = 3306;
            $database = "pbd_kel6";
            $username = "root";
            $password = "";

            return new \PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
        }

    }

}
