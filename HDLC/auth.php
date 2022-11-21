<?php
    session_start();
    include("src/apis/_mailExists.php");
    include("src/apis/databaseConnection.php"); // DB
    include("src/apis/registerPatient.php");
    include("src/apis/registerDoctor.php");
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

    // POST REGISTER PATIENT
    if(
        postValuesExist('api', 'correo', 'pass', 'nombre', 'num_tel', 'SEXO', 'fechaN')
        &&
        $_POST['api'] == 'registerPatient'
    ) postPatientRegister();

    // POST REGISTER DOCTOR
    if(
        postValuesExist('api', 'correo', 'pass', 'nombre', 'num_tel', 'SEXO', 'fechaN', 'cedula', 'ESPECIALIDAD')
        &&
        $_POST['api'] == 'registerDoctor'
    ) postDoctorRegister();

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

?>