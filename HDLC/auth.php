<?php
    include("src/apis/login.php");

    if(!isset($_POST["api"])) {
        Header("Location: /");
    }

    // POST
    if($_POST["api"] === "login") postLoginForm();

?>