<?php
    include("Conexiondb.php");
    $con=conexion();
    $query;
    $query2;
    $query3;
    
    //Si se recibe el submit de PacienteRegistro.php
    if(isset($_POST['save_up'])){ 
        
        if(($sexo=$_POST['SEXO'])!="Elegir..."){ //Si ya escogio un sexo...
            //Variables de usuario
            $correo=$_POST['correo'];
            $pass=$_POST['pass'];
            $nombre=strtoupper($_POST['nombre']);
            $num_tel=$_POST['num_tel'];
            //$sexo --ya está arriba
            $fechaNacimiento=date('Y-m-d', strtotime($_POST['fechaN'])); //Convirtiendo a formado YY-MM-DD
            $edad=busca_edad($fechaNacimiento);

                //Verificando que el email sea como debe ser
            if(filter_var($correo,FILTER_VALIDATE_EMAIL)){
                //se hace consulta en usuarios con la direccion del correo
                $consultaCorreo="SELECT COUNT(correo) FROM usuarios WHERE correo='$correo'";
                $qCorreo=mysqli_query($con,$consultaCorreo);
                $valor=mysqli_fetch_array($qCorreo);
    
                //SENTENCIA Insert en la tabla PACIENTE
                $insertPaciente="INSERT INTO u_paciente(correo_pac) values('$correo')";

                if($valor[0]==1){ //SI EL EMAIL YA ESTA REGISTRADO EN USUARIOS
                    Header("Location: ../PacienteRegistro.php?error=Email no disponible");
                }else if($valor[0]==0){//SI EL EMAIL NO ESTA en usuarios

                //Insercion del usuario
                    $insertUsuario="INSERT INTO usuarios(correo,pass,nombre,num_tel,sexo,edad,fecha_nac) values ('$correo','$pass','$nombre',$num_tel,'$sexo',$edad,'$fechaNacimiento')";
                    $QinsertUsuario=mysqli_query($con,$insertUsuario);

                    //EJECUCION DEL INSERT EN PACIENTES
                    $QinsertPaciente=mysqli_query($con,$insertPaciente);

                    if($QinsertPaciente=true){
                        //Si todo fue bien en la insercion de paciente, se dirige a la siguiente pagina
                        mysqli_free_result($QinsertPaciente);
                        mysqli_free_result($QinsertUsuario);
                        mysqli_free_result($qCorreo);
                        mysqli_close($con);
                        Header("Location: ../IUPaciente.php");
                    }else{
                        Header("Location: ../PacienteRegistro.php?error=Algo salio mal, lo sentimos");
                    }
                }
            }else{
                Header("Location: ../PacienteRegistro.php?error=Email invalido");
            }
        }else{ //Si no selecciono un sexo...
            mysqli_close($con);
            Header("Location: ../PacienteRegistro.php?error=Selecciona un sexo");
        }

        //---------------------------------DOCTORES-------------------------
    }else if(isset($_POST['save_ud'])){
        if(($sexo=$_POST['SEXO'])!="Elegir..."){ //Si ya escogio un sexo...
            //Variables de usuario
            $correo=$_POST['correo'];
            $pass=$_POST['pass'];
            $nombre=strtoupper($_POST['nombre']);
            $num_tel=$_POST['num_tel'];
            //$sexo --ya está arriba
            $fechaNacimiento=date('Y-m-d', strtotime($_POST['fechaN'])); //Convirtiendo a formado YY-MM-DD
            $edad=busca_edad($fechaNacimiento);
           
            //Verificando que el email sea como debe ser
            if(filter_var($correo,FILTER_VALIDATE_EMAIL)){
                //se hace consulta en usuarios con la direccion del correo
                $consultaCorreo="SELECT COUNT(correo) FROM usuarios WHERE correo='$correo'";
                $qCorreo=mysqli_query($con,$consultaCorreo);
                $valor=mysqli_fetch_array($qCorreo);
    
                //SENTENCIA Insert en la tabla PACIENTE
                $insertDoctor="INSERT INTO u_doctor(correo_doc) values('$correo')";

                if($valor[0]==1){ //SI EL EMAIL YA ESTA REGISTRADO EN USUARIOS
                    Header("Location: ../DoctorRegistro.php?error=Email no disponible");
                }else if($valor[0]==0){//SI EL EMAIL NO ESTA en usuarios
                //Insercion del usuario
                    $insertUsuario="INSERT INTO usuarios(correo,pass,nombre,num_tel,sexo,edad,fecha_nac) values ('$correo','$pass','$nombre',$num_tel,'$sexo',$edad,'$fechaNacimiento')";
                    $QinsertUsuario=mysqli_query($con,$insertUsuario);

                    //EJECUCION DEL INSERT EN DOCTORES
                    $QinsertDoctor=mysqli_query($con,$insertDoctor);

                    if($QinsertDoctor=true){
                        //Si todo fue bien en la insercion de paciente, se dirige a la siguiente pagina
                        mysqli_free_result($QinsertDoctor);
                        mysqli_free_result($QinsertUsuario);
                        mysqli_free_result($qCorreo);
                        mysqli_close($con);
                        Header("Location: ../IUDoctor.php");
                    }else{
                        Header("Location: ../DoctorRegistro.php?error=Algo salio mal, lo sentimos");
                    }

                }
            }else{
                Header("Location: ../DoctorRegistro.php?error=Email invalido");
            }
        }else{ //Si no selecciono un sexo...
            mysqli_close($con);
            Header("Location: ../DoctorRegistro.php?error=Selecciona un sexo");
        }
    }     

    
    function busca_edad($fechaNacimiento){
        $dia=date("d");
        $mes=date("m");
        $ano=date("Y");
                
        $dianaz=date("d",strtotime($fechaNacimiento));
        $mesnaz=date("m",strtotime($fechaNacimiento));
        $anonaz=date("Y",strtotime($fechaNacimiento));
        
        //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
        if (($mesnaz == $mes) && ($dianaz > $dia)) {
        $ano=($ano-1); }
        
        //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
        if ($mesnaz > $mes) {
        $ano=($ano-1);}
        
        //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
        $edad=($ano-$anonaz);

        return $edad;
    }
?>