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
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/error.css">
</head>
<body>
    <div class="container">
        <form class="row" method="POST" action="connection/InsertUser.php">
            <?php
                if(isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php
                }
            ?>    

            <div class="col-6">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="correo" placeholder="Escribe tu email" required>
            </div>

            <div class="col-6">
                <label for="inputPass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="inputPass" name="pass" placeholder="Escribe tu contraseña" required>
            </div>

            <div class="col-12">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Escribe tu nombre completo" required>
            </div>

            <div class="col-4">
                <label for="inputPhone" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="inputPhone" name="num_tel" placeholder="Escribe tu numero telefonico" required>
            </div>

            <div class="col-4">
                <label for="selectSexo" class="form-label">Sexo</label>
                <select name="SEXO" class="form-select" aria-label="Default select example">
                    <option selected>Elegir...</option>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMENINO">FEMENINO</option>
                </select>
            </div>

            <div class="col-4">
                <label for="selectAlias" class="form-label">Usuario</label>
                <select name="TIPOUSER" class="form-select" aria-label="Default select example">
                    <option selected>Tipo de usuario...</option>
                    <option value="PACIENTE">PACIENTE</option>
                    <option value="DOCTOR">DOCTOR</option>
                </select>
            </div>

            <!--SI FUERA PACIENTE, SE PIDE LO SIGUIENTE-->
            <div class="col-4">
                <label for="inputEdad" class="form-label">Edad</label>
                <input type="text" class="form-control" id="inputEdad" name="edad" placeholder="Escribe tu edad">
            </div>

            <!-------------------SI FUERA DOCTOR-->
            <div class="col-4">
                <label for="inputCedula" class="form-label">Cedula</label>
                <input type="text" class="form-control" id="inputCedula" name="cedula" placeholder="Escribe tu cedula">
            </div>

            <div class="col-4">
                <label for="selectEsp" class="form-label">Especialidad</label>
                <select name="ESPECIALIDAD" class="form-select" aria-label="Default select example">
                    <option selected>Elige...</option>
                    <!--Llenando el componente select de especialidades de la bd-->
                    <?php
                        $sql="SELECT id_esp,descripcion FROM especialidad";
                        $query=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($query)){
                            $idesp=$row['id_esp'];
                            $desesp=$row['descripcion'];
                            ?>
                          
                            <option value="<?php echo $idesp ?> "> <?php echo $desesp?>  </option>
                            <?php
                        }
                    ?>
                    <!--<option value="otraEsp">Otra</option>-->
                </select>
            </div>
            
            <div class="col-4">
                <input type="submit" class="btn btn-primary" value="GUARDAR">
            </div>

        </form>

    </div>
    
</body>
</html>
