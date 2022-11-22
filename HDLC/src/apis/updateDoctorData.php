<?php

    function postUpdateDoctorData() {

        $con = connect();
        $name = $_POST['nombre'];
        $pass = $_POST['password'];
        $phone = $_POST['phone'];
        $longdesc = $_POST['longdesc'];
        //$photo = $_POST['foto'];

        $IDDoc=$_SESSION['userId'];
        $SCD="SELECT correo_doc from u_doctor where id_doctor=$IDDoc";
        $qcd=mysqli_query($con,$SCD);
        $rqcd=mysqli_fetch_array($qcd);
        $correoDoc=$rqcd[0];
       
        $sUpdateU="UPDATE usuarios set nombre='$name', pass='$pass', num_tel=$phone where correo='$correoDoc'";
        $qsUpdateU=mysqli_query($con, $sUpdateU);

        $sUpdateD="UPDATE u_doctor set desc_doc='$longdesc' where correo_doc='$correoDoc'";
        $qsUpdateD=mysqli_query($con, $sUpdateD);
     

        if($qsUpdateU==true||$qsUpdateD==true){
            Header("Location: doctor.php");
        }else{
            Header("Location: doctor.php?error=No se pudo actualizar");
        } 

    }

?>