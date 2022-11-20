<?php 
    function conexion(){
        $host = $_ENV["HDLC1_DATABASE_HOST"];
        $user = $_ENV["HDLC1_DATABASE_USER"];
        $pass = $_ENV["HDLC1_DATABASE_PASS"];
        $db = $_ENV["HDLC1_DATABASE_DB"];

        $con = mysqli_connect($host, $user, $pass);
        mysqli_select_db($con, $db);
        return $con;
    }
?>