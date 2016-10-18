<?php

class Connect
{
    function __construct() {
    }
    
    function __destruct() {
    }
    
    public function Connect()
    {
        require_once 'Config.php';
        $con= mysqli_connect(DB_HOST,DB_USER,DB_PASS);
        mysqli_select_db($con,DB_NAME);
        return $con;
    }
    
    public function close()
    {
        mysqli_close($con);
    }
}

