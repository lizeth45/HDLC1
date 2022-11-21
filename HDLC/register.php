<?php
    session_start();
    include("src/common/Head.php");
    include("src/apis/databaseConnection.php");
    $con = connect();
?>

<!DOCTYPE html>
<html lang="en">
<?= Head("Registro de usuario", [
    'assets/css/error.css',
    'assets/css/register.css'
]) ?>
<body>
    <div class="container w-50 bg-white mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <!--En la siguiente col estará el form-->
            <div class="col bg-white p-5 rounded"> 
                <div class="text-end">
                    <img src="/assets/icons/HDLC.png" width="48" alt="">
                </div>
                <h2 class="fw-bold text-center">¿Cómo deseas registrarte?</h2>
                <!--FORMULARIO-->
                <div class="row">
                    <?php
                        if(isset($_GET['error'])){?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php
                        }
                    ?>  
                    <div class="col-12">
                        <label for="selectAlias" class="form-label">Usuario</label>
                        <select name="TIPOUSER" class="form-select" aria-label="Default select example" onchange="toggleRegisterForm(this)">
                            <option selected>Tipo de usuario...</option>
                            <option value="PACIENTE">PACIENTE</option>
                            <option value="DOCTOR">DOCTOR</option>
                        </select>
                    </div>
                    <!-- <div class="col-5"></div> -->
                    <!-- <div class="col-4 py-4">
                        <input type="submit" class="btn btn-primary" name='siguienteTU' value="Siguiente">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container w-75 bg-white mt-5 rounded shadow hide doctor-form-container">
        <div class="row align-items-stretch">     
            <!--En la siguiente col estará el form-->
            <div class="col bg-white p-5 rounded"> 
                <div class="text-end">
                    <img src="/icons/HDLC.png" width="48" alt="">
                </div>
                <h2 class="fw-bold text-center">REGISTRO DOCTOR</h2>
                <!--FORMULARIO-->
                <form class="row" method="POST" action="auth.php">
                    <input type="hidden" name="api" value="registerDoctor" />
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
                        </select>
                    </div>
                    <div class="col-4 ">
                    </div>            
                    <div class="col-5 py-3">
                        <input type="submit" class="btn btn-primary" name='save_ud' value="GUARDAR">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container w-75 bg-white mt-5 rounded shadow hide patient-form-container">
        <div class="row align-items-stretch">
            
            <!--En la siguiente col estará el form-->
            <div class="col bg-white p-5 rounded"> 
                <div class="text-end">
                    <img src="/assets/icons/HDLC.png" width="48" alt="">
                </div>
                <h2 class="fw-bold text-center">REGISTRO PACIENTE</h2>
                <!--FORMULARIO-->
                <form class="row" method="POST" action="auth.php">
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
                    <input type="hidden" name="api" value="registerPatient" />
                    <div class="col-4 py-3">
                        <input type="submit" class="btn btn-primary" name='save_up' value="GUARDAR">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/js/scriptIUP.js"></script>
</body>
</html>