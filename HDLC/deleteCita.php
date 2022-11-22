<?php
    include("src/apis/databaseConnection.php");
    $con = connect();
    
    if(isset($_GET['value'])){
        $idCita=$_GET['value'];
        $sentencia="DELETE from cita where id_cita=$idCita";
        $query=mysqli_query($con,$sentencia);
        $row=mysqli_fetch_array($query);
    }

?>