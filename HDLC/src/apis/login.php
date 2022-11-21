<?php
    include("databaseConnection.php");
    include("sanitize.php");

    function postLoginForm() {
        
        // If any param is missing, return to home due to an invalid request
        if(!isset($_POST["username"]) && !isset($_POST["password"])) Header("Location: /");

        $con = connect();

        $username = sanitizeValue($_POST["username"]);
        $password = sanitizeValue($_POST["password"]);

        $query = "SELECT * FROM usuarios WHERE correo='$username' AND pass='$password'";
        
        $queryResult = mysqli_query($con, $query);
        $result = mysqli_fetch_array($queryResult);

        // Principal login logic
        if(isset($result[0])) {
            // Found user
            echo "LOGGED IN.";
        } else {
            // Failed login
            echo "ERROR";
        }

        mysqli_free_result($result[0]);
        mysqli_close($con);

    }

?>