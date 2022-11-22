<?php

    function postPatientGenerateAppointment() {
        $con = connect();
        $name = $_POST['name'];
        $motive = $_POST['motive'];
        $date = date('Y-m-d', strtotime($_POST['date']));
        $hora = $_POST['hora'];
        $sg=':00';        
        $doctor = $_POST['doctor'];

        // TODO: Implement database query
        $sentencia1="SELECT COUNT(nombre) as nombre from usuarios where nombre='$name'";
        $queryName=mysqli_query($con,$sentencia1);
        $queryNameR=mysqli_fetch_array($queryName);
        
        if($queryNameR['nombre']==1){ //Si existe ese nombre en la bd
            $sentencia2="SELECT p.correo_pac, p.id_paciente from u_paciente as p inner join usuarios as u on p.correo_pac=u.correo where u.nombre='$name'";
            $queryP=mysqli_query($con,$sentencia2);
            $dataPac=mysqli_fetch_array($queryP);
            $correoPac=$dataPac['correo_pac'];
            $idPac=$dataPac['id_paciente'];

            $sentencia3="SELECT d.correo_doc, d.id_doctor from u_doctor as d inner join usuarios as u on d.correo_doc=u.correo where u.nombre='$doctor'";
            $queryD=mysqli_query($con,$sentencia3);
            $dataDoc=mysqli_fetch_array($queryD);
            $correoDoc=$dataDoc['correo_doc'];
            $idDoc=$dataDoc['id_doctor'];
            
            //INSERT EN TABLA CITA
            $sentenciaCita="INSERT INTO cita(correo_pac,correo_doc,id_doctor,id_paciente) values ('$correoPac', '$correoDoc', $idDoc, $idPac)";
            $queryCita=mysqli_query($con,$sentenciaCita);

            $sentenciaIDCITA="SELECT MAX(id_cita) as id_cita from cita";
            $queryIDCITA=mysqli_query($con,$sentenciaIDCITA);
            $rowidCita=mysqli_fetch_array($queryIDCITA);
            $idCita=$rowidCita['id_cita'];

            //INSERT EN DET_CITA
            $sentenciaDetalleC="INSERT INTO det_cita(asunto,fecha,hora,id_cita) values('$motive','$date','$hora$sg',$idCita)";
            $queryDC=mysqli_query($con, $sentenciaDetalleC);   
            
            Header("Location: paciente.php");
        }else{
            Header("Location: paciente.php?error=Nombre desconocido");
        }
        // TODO: Implement database query
        // TODO: Implement redirection based on success or error
    }

?>