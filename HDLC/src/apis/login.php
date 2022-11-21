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
            $_SESSION['userId'] = '-1'; // TODO: Save userid from result
            $_SESSION['userType'] = 'doctor'; // TODO: Save user type based on database query
            Header("Location: /paciente.php");
        } else {
            // Failed login
            Header("Location: login.php?err=1");
        }

        mysqli_free_result($result[0]);
        mysqli_close($con);

    }

?>