<!DOCTYPE html>
<html lang="en">
    <?php include("src/common/Head.php"); ?>
    <body>
        <div class="container w-75 bg-primary mt-5 rounded shadow">
            <div class="row align-items-stretch">
                <!--Aqui estará la imagen de fondo-->
                <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"></div>
                <!--En la siguiente col estará el form-->
                <div class="col bg-white p-5 rounded-end"> 
                    <div class="text-end">
                        <img src="/assets/icons/HDLC.png" width="48" alt="">
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
                            <span>¿No tienes cuenta? <a href="SelecTU.php">Regístrate</a></span> 
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </body>
</html>