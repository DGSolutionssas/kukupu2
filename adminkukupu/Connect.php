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
        if (!$con)
        {
          $file = fopen("archivo.txt", "a");
          fwrite($file, "Error : " .  mysqli_error() . PHP_EOL);
          fclose($file);
        }
        mysqli_select_db($con,DB_NAME);
        return $con;
    }

    public function close()
    {
        mysqli_close($con);
    }
}
