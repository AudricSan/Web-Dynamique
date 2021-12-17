<?php
    // The following variables allow you to connect to the database 

        $username = "root";     //The login to connect to the DB
        $password = "";         // The password to connect me to the DB
        $host = "localhost";    // The link of the server where my DB is located
        $dbname = "E-Shop";       // The name of the DB I want to attack

    // EVERYTHING BELOW DOES NOT CHANGE
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
        }
        catch(PDOException $ex){
            die("Failed to connect to the database: " . $ex);
        }

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>