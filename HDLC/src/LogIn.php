<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/error.css">

    <style>
        body{
            background: #ffe259;
            background: linear-gradient(to right, #F7F9F9, #AED6F1 );
        }
        .bg{
            background-image: url(../icons/logIn.jpg);
            background-position: center center;
        }
    </style>

</head>
<body>
    <div class="container w-75 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <!--Aqui estará la imagen de fondo-->
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"> 
            </div>
            <!--En la siguiente col estará el form-->
            <div class="col bg-white p-5 rounded-end"> 
                <div class="text-end">
                    <img src="../icons/HDLC.png" width="48" alt="">
                </div>
                <h2 class="fw-bold text-center py-5">INICIA SESION</h2>
                <!--LOGIN-->
                <form method="POST" action="connection/SearchUser.php"> 
                    <?php
                        if(isset($_GET['error'])){?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php
                        }
                    ?>
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="ej: user@gmail.com" required>
                    </div> 
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="contraseña" required>
                    </div> 
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar</button>
                    </div>
                    <div class="my-3">
                        <span>¿No tienes cuenta? <a href="Registro.php">Regístrate</a></span> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>