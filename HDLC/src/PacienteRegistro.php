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
    <div class="container w-75 bg-white mt-5 rounded shadow">
        <div class="row align-items-stretch">
            
            <!--En la siguiente col estará el form-->
            <div class="col bg-white p-5 rounded"> 
                <div class="text-end">
                    <img src="../icons/HDLC.png" width="48" alt="">
                </div>
                <h2 class="fw-bold text-center">INGRESA TUS DATOS</h2>
                <!--FORMULARIO-->
                <form class="row" method="POST" action="connection/InsertUser.php">
                    <?php
                        if(isset($_GET['error'])){?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php
                        }
                    ?>  
                    <div class="col-6">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailInput" name="correo" placeholder="Ej: user12@gmail.com" required>
                    </div>

                    <div class="col-6">
                        <label for="inputPass" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="inputPass" name="pass" placeholder="Escribe tu contraseña" required>
                    </div>

                    <div class="col-12">
                        <label for="inputName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Escribe tu nombre completo" required="" pattern="[a-zA-Z\s]+">
                    </div>

                    <div class="col-4">
                        <label for="inputPhone" class="form-label">Telefono</label>
                        <input minlength="10" maxlength="10" type="text" class="form-control" id="inputPhone" name="num_tel" placeholder="10 digitos" required="" pattern="[0-9]+">
                    </div>

                    <div class="col-4">
                        <label for="selectSexo" class="form-label">Sexo</label>
                        <select name="SEXO" class="form-select" aria-label="Default select example">
                            <option selected>Elegir...</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                            <option value="PREFIERO NO DECIRLO">PREFIERO NO DECIRLO</option>
                        </select>
                    </div>

                    <!--fecha de nacimiento-->
                    <div class="col-4">
                        <label for="inputFN" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="inputFN" name="fechaN" required>
                    </div>
                    
                    <div class="col-4 py-3">
                        <input type="submit" class="btn btn-primary" name='save_up' value="GUARDAR">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>