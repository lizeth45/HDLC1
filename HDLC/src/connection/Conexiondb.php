<?php 
    function conexion(){
        $host = $ENV["HDLC1_DATABASE_HOST"];
        $user = $ENV["HDLC1_DATABASE_USER"];
        $pass = $ENV["HDLC1_DATABASE_PASS"];
        $db = $ENV["HDLC1_DATABASE_DB"];

        $con = mysqli_connect($host, $user, $pass);
        mysqli_select_db($con, $db);
        return $con;
    }
?>