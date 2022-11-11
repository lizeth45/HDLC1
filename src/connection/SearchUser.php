<?php
  include("Conexiondb.php");
  $con=conexion();

    if(isset($_POST['email'])&&isset($_POST['password'])){

        $correo=$_POST['email'];
        $contrasena=$_POST['password'];

        $consultaCorreo="SELECT COUNT(correo) FROM usuarios WHERE correo='$correo'";
        $queryCorreo=mysqli_query($con,$consultaCorreo);
        $resCorreo=mysqli_fetch_array($queryCorreo);
        
        if($resCorreo[0]==1){

            $consultaPass="SELECT COUNT(pass) FROM usuarios WHERE pass='$contrasena'";
            $queryPass=mysqli_query($con,$consultaPass);
            $resPass=mysqli_fetch_array($queryPass);

            if($resPass[0]==1){
                $consultaDoc="SELECT COUNT(correo_doc) from u_doctor WHERE correo_doc='$correo'";
                $doc=mysqli_query($con,$consultaDoc);
                $resDoc=mysqli_fetch_array($doc);
                if($resDoc[0]==1){
                    Header("Location: ../IUDoctor.php");
                    mysqli_free_result($doc);
                    mysqli_close($con);
                }else{            //Si no esta en doctores, entonces es usuario paciente y se dirige a su respectiva interfaz
                    Header("Location: ../IUPaciente.php");
                    mysqli_close($con);
                }
            }else{
                Header("Location: ../LogIn.php?error=Contraseña incorrecta");
            }

        }else{
            Header("Location: ../LogIn.php?error=Correo incorrecto o desconocido");
        }

    }
?>