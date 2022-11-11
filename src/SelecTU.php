<?php
  include("connection/Conexiondb.php");
  $con=conexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="shortcut icon" href="../Icons/iconpg.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/error.css">

    <style>
        body{
            background: #ffe259;
            background: linear-gradient(to right, #F7F9F9, #AED6F1 );
        }
        .bg{
            background-position: center center;
        }
    </style>

</head>
<body>
    <div class="container w-50 bg-white mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <!--En la siguiente col estará el form-->
            <div class="col bg-white p-5 rounded"> 
                <div class="text-end">
                    <img src="../icons/HDLC.png" width="48" alt="">
                </div>
                <h2 class="fw-bold text-center">¿Cómo deseas registrarte?</h2>
                <!--FORMULARIO-->
                <form class="row" method="POST" action="connection/DireccionamientoTU.php">
                    <?php
                        if(isset($_GET['error'])){?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php
                        }
                    ?>  
                    <div class="col-12">
                        <label for="selectAlias" class="form-label">Usuario</label>
                        <select name="TIPOUSER" class="form-select" aria-label="Default select example">
                            <option selected>Tipo de usuario...</option>
                            <option value="PACIENTE">PACIENTE</option>
                            <option value="DOCTOR">DOCTOR</option>
                        </select>
                    </div>
                    <div class="col-5">
                    </div>
                    <div class="col-4 py-4">
                        <input type="submit" class="btn btn-primary" name='siguienteTU' value="Siguiente">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>