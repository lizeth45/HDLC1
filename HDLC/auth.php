<?php
    include("src/apis/login.php");

    function postValuesExist() {
        $values = func_get_args();
        $missing = false;
        foreach($values as $key) {
            $missing = !isset($_POST[$key]);
        }
        return !$missing;
    }

    // POST
    if(postValuesExist('email', 'password')) postLoginForm();

    echo "No execution found";

?>