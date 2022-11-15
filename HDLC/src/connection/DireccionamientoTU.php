<?php
   //Si se recibe el submit de ese boton de selecTU.php
    if(isset($_POST['siguienteTU'])){ 
        $tipoUser=$_POST['TIPOUSER'];

        if($tipoUser=="PACIENTE"){ //SI ES PACIENTE
            Header("Location: ../PacienteRegistro.php"); //Se manda a la interfaz de insertar paciente
        }else if($tipoUser=="DOCTOR"){
            Header("Location: ../DoctorRegistro.php"); //Se manda a la interfaz de insertar paciente
        }else{
            Header("Location: ../SelecTU.php?error=Selecciona un tipo de usuario"); //Se manda a la interfaz de insertar paciente
        }
    }
?>