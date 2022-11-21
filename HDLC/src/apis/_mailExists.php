<?php

    function mailExists($con, $email) {

        $query = "SELECT COUNT(correo) FROM usuarios WHERE correo='$email'";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_array($result);

        return $data[0] == 1;
    }

?>