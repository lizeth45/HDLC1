<?php

    function postUpdatePatientData() {

        $con = connect();
        $BAN=0;
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $phone = $_POST['phone'];

        $IDpac=$_SESSION['userId'];
        $SCP="SELECT correo_pac from u_paciente where id_paciente=$IDpac";
        $qcp=mysqli_query($con,$SCP);
        $rqcp=mysqli_fetch_array($qcp);
        $correoPac=$rqcp[0];

       
        $sUpdate="UPDATE usuarios set nombre='$name', pass='$pass', num_tel=$phone where correo='$correoPac'";
        $qsUpdate=mysqli_query($con, $sUpdate);

        if($qsUpdate){
            Header("Location: /paciente.php");
        }else{
            Header("Location: /paciente.php?error=No se pudo actualizar");
        } 
    }

?>