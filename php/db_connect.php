<?php

/**
 * A class file to connect to database
 */

class DB_CONNECT {

    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/db_config.php';

        // Connecting to mysql database
        $con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // returing connection cursor
        return $con;
    }
}

?>