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
            
            //if(){

            }


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
                }
            }

            if($query==true){

                if($query2==true){
                    //Si todo fue bien en pacientes, se dirige a la siguiente pagina
                    Header("Location: IUPaciente.php");
                }else if($query3==true){
                    //Si todo fue bien, se dirige a la siguiente pagina
                    Header("Location: IUDoctor.php");
                }
            }else{
                Header("Location: Registro.php");
            }
        }
    }

?>