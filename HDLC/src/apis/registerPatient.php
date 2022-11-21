<?php

    function postPatientRegister() {
        $con = connect();

        $email = $_POST['correo'];
        $pass = $_POST['pass'];
        $name = $_POST['nombre'];
        $cellphone = $_POST['num_tel'];
        $gender = $_POST['SEXO'];
        $birthday = $_POST['fechaN'];

        if(mailExists($con, $email)) Header("Location: /?mailUsed=1");

        $mainQuery = "INSERT INTO usuarios(correo,pass,nombre,num_tel,sexo,edad,fecha_nac) values ('$email','$pass','$name',$cellphone,'$gender',0,'$birthday')";
        $secondaryQuery = "INSERT INTO u_paciente(correo_pac) values('$email')";

        $mainResult = mysqli_query($con, $mainQuery);
        $secondaryResult = mysqli_query($con, $secondaryQuery);

        if(!$mainResult || !$secondaryResult) Header("Location: /?registerFail=1");

        mysqli_close($con);

        Header("Location: /login.php");

    }

?>