<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ics3104');

class DBConnector{

    public $conn;

    function __construct(){
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die("Connect failed: %s\n". $conn -> error);
    
    }

    function closeDatabase(){
        mysqli_close($this->conn);
    }
}

?>