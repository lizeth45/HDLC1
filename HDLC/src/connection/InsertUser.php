<?php
    include("Conexiondb.php");
    $con=conexion();
    $query;
    $query2;
    $query3;
    
    if(isset($_POST['SEXO'])){

        //Condicion para evaluar que se escogio una de las opciones
        if(($sexo=$_POST['SEXO'])!="Elegir..."){
            
            //Variables para registro en entidad usuarios
            $correo=$_POST['correo'];
            $consultaCorreo="SELECT COUNT(correo) FROM usuarios WHERE correo='$correo'";
            $qCorreo=mysqli_query($con,$consultaCorreo);
            $valor=mysqli_fetch_array($qCorreo);
            
            if($valor[0]==1){
                mysqli_free_result($qCorreo);
                mysqli_close($con);
                Header("Location: ../Registro.php?error=Email en uso");
            }else{
                $pass=$_POST['pass'];
                $nombre=strtoupper($_POST['nombre']);
                $num_tel=$_POST['num_tel'];

                //Query
                $insertUser="INSERT INTO usuarios VALUES('$correo','$pass','$nombre',$num_tel,'$sexo')";

                $tusuario=$_POST['TIPOUSER'];
                if($tusuario=="PACIENTE"){
                    
                    //Insercion del usuario
                    $query=mysqli_query($con,$insertUser);
                    //Variable faltante para la entidad paciente
                    $edad=$_POST['edad'];
                    //Insercecion en db->TABLA  u_pacientes
                    $insertPaciente="INSERT INTO u_paciente(correo_pac,edad) VALUES('$correo',$edad)";
                    $query2=mysqli_query($con,$insertPaciente);
                    //Si la insercion del paciente fue exitosa...
                    if($query2=true){
                        //Si todo fue bien en pacientes, se dirige a la siguiente pagina
                        Header("Location: ../IUPaciente.php");
                        //Liberando la consulta 
                        mysqli_free_result($query2);
                        mysqli_free_result($query);
                        mysqli_close($con);
                    }else{
                        Header("Location: ../Registro.php?error=Algo salio mal, intentalo de nuevo");
                    }

                }else if($tusuario=="DOCTOR"){

                    //Insercion del usuario
                    $query=mysqli_query($con,$insertUser);
                    
                    //Variables para la entidad doctor
                    $idEsp=$_POST['ESPECIALIDAD'];
                    if($idEsp!="Elige..."){
                        
                        $cedula=$_POST['cedula'];
                        //Insercecion en db->TABLA  u_doctor
                        $insertDoctor="INSERT INTO u_doctor(correo_doc,id_esp,cedula) VALUES('$correo',$idEsp,$cedula)";
                        $query3=mysqli_query($con,$insertDoctor);

                        if($query3=true){
                            //Si todo fue bien, se dirige a la siguiente pagina
                            Header("Location: ../IUDoctor.php");
                            mysqli_free_result($query3);
                            mysqli_free_result($query);
                            mysqli_close($con);
                        }else{
                            Header("Location: ../Registro.php?error=Algo salio mal, intentalo de nuevo");
                        }

                    }else{
                        Header("Location: ../Registro.php?error=Seleccione una especialidad");
                    }

                }else{
                    Header("Location: ../Registro.php?error=Selecciona el tipo de usuario");
                }
            }
        }else{
            Header("Location: ../Registro.php?error=Selecciona un sexo");
        }
    }
?>