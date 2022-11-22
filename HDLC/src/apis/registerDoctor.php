<?php

    function postDoctorRegister() {
        
        $con = connect();

        $email = $_POST['correo'];
        $pass = $_POST['pass'];
        $name = $_POST['nombre'];
        $cellphone = $_POST['num_tel'];
        $gender = $_POST['SEXO'];
        $birthday = $_POST['fechaN'];
        $profId = $_POST['cedula'];
        $spec = $_POST['ESPECIALIDAD'];

        if(mailExists($con, $email)) Header("Location: /?mailUsed=1");

        $mainQuery = "INSERT INTO usuarios(correo,pass,nombre,num_tel,sexo,edad,fecha_nac) values ('$email','$pass','$name',$cellphone,'$gender',0,'$birthday')";
        $secondaryQuery = "INSERT INTO u_doctor(correo_doc, id_esp, cedula) values('$email', $spec, '$profId')";

        $mainResult = mysqli_query($con, $mainQuery);
        $secondaryResult = mysqli_query($con, $secondaryQuery);

        if(!$mainResult || !$secondaryResult) Header("Location: /?registerFail=1");

        mysqli_close($con);

        Header("Location: /login.php");

    }

?>