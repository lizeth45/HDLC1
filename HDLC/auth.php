<?php
    session_start();
    include("src/apis/login.php");
    include("src/apis/updateDoctorData.php");
    include("src/apis/updatePatientData.php");
    include("src/apis/generatePatientAppointment.php");

    function postValuesExist() {
        $values = func_get_args();
        $missing = false;
        foreach($values as $key) {
            $missing = !isset($_POST[$key]);
        }
        return !$missing;
    }

    // POST LOGIN FORM
    if(
        postValuesExist('api', 'email', 'password')
        &&
        $_POST['api'] == 'login'
    ) postLoginForm();

    // POST UPDATE DOCTOR DATA
    if(
        postValuesExist('api', 'nombre', 'password', 'phone', 'longdesc')
        &&
        $_POST['api'] == 'updateDoctor'
    ) postUpdateDoctorData();

    // POST UPDATE PATIENT DATA
    if(
        postValuesExist('api', 'name', 'password', 'phone')
        &&
        $_POST['api'] == 'updatePatient'
    ) postUpdatePatientData();

    // POST GENERATE APPOINTMENT
    if(
        postValuesExist('api', 'name', 'motive', 'date', 'hora', 'doctor')
        &&
        $_POST['api'] == 'generateAppointment'
    ) postPatientGenerateAppointment();

    Header("Location: /?noExec=1");

?>