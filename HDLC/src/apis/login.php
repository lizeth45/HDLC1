<?php
    include("sanitize.php");

    function postLoginForm() {

        $con = connect();

        $username = sanitizeValue($_POST['email']);
        $password = sanitizeValue($_POST['password']);

        $query = "SELECT * FROM usuarios WHERE correo='$username' AND pass='$password'";
        
        $queryResult = mysqli_query($con, $query);
        $result = mysqli_fetch_array($queryResult);

        // Principal login logic
        if($result[0]) {
            // Found user
            $_SESSION['isLoggedIn'] = true;
            $consultaDoc="SELECT COUNT(correo_doc) from u_doctor WHERE correo_doc='$username'";
            $doc=mysqli_query($con,$consultaDoc);
            $resDoc=mysqli_fetch_array($doc);
            if($resDoc[0]==1){  //Si esta como doctor...
                $consultaIDDoc="SELECT id_doctor from u_doctor WHERE correo_doc='$username'";
                $docQ=mysqli_query($con,$consultaIDDoc);
                $resIDDoc=mysqli_fetch_array($docQ);

                $_SESSION['userId'] = $resIDDoc[0];
                $_SESSION['userType'] = "doctor";
                Header("Location: /doctor.php");
            }else{
                $consultaIDPac="SELECT id_paciente from u_paciente WHERE correo_pac='$username'";
                $pacQ=mysqli_query($con,$consultaIDPac);
                $resIDPac=mysqli_fetch_array($pacQ);

                $_SESSION['userId'] = $resIDPac[0];
                $_SESSION['userType'] = "paciente";
                Header("Location: /paciente.php");
            }
        } else {
            // Failed login
            Header("Location: login.php?err=1");
        }

        mysqli_free_result($result[0]);
        mysqli_close($con);

    }

?>