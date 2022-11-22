<?php
  session_start();
  if(!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    Header("Location: /");
  }
  if($_SESSION['userType']!="doctor"){
    Header("Location: /paciente.php");
  }
  include("src/common/include.php");
  include("src/apis/databaseConnection.php");
  $con = connect();
?>
<!DOCTYPE html>
<html lang="en">
    <?= Head("Doctores", [
    "assets/css/style-IUPaciente.css"
  ]) ?>
<body>
    <nav class="sidebar close">
          <header>
              <div class="image-text">
                  <span class="image">
                      <img src="/assets/icons/HDLC.png" alt="logo">
                  </span>

                  <div class="text header-text">
                      <span class="name">Hospital De La Cruz</span>
                      <span class="desc">HDLC</span>
                  </div>
              </div>

              <i class='bx bx-chevron-right toggle'></i>
          </header>

          <div class="menu-bar">
              <div class="menu">
                  <ul class="menu-links">
                          <li class="Icitas-prox">
                              <a href="javascript:void(0);">
                                  <i class='bx bx-health icon'></i>
                                  <span class="text nav-text">Citas próximas</span>
                              </a>
                          </li>
                          <li class="Icitas">
                            <a href="javascript:void(0);">
                                  <i class='bx bx-calendar icon'></i>
                                  <span class="text nav-text">Historial</span>
                            </a>
                          </li>
                          <li class="Iperfil">
                            <a href="javascript:void(0);">
                                  <i class='bx bx-cog icon'></i>
                                  <span class="text nav-text">Editar Perfil</span>
                            </a>
                          </li>
              </div>

              <div class="bottom-content">
                  <li class="">
                      <a href="logout.php">
                          <i class='bx bx-log-out icon' ></i>
                          <span class="text nav-text">Cerrar sesión</span>
                      </a>
                  </li>
                  <li class="mode">
                      <div class="moon-sun">
                          <i class='bx bx-moon icon moon' ></i>
                          <i class='bx bx-sun icon sun' ></i>
                      </div>
                      <span class="mode-text text">Dark Mode</span>

                      <div class="toggle-switch">
                          <span class="switch"></span>
                      </div>
                  </li>
              </div>
          </div>
    </nav>

    <section class="iupac ctpr">
        <section class="agendar">
            <h1 class="text">Citas próximas</h1>
            <section class="citaconteiner">
              <?php
                $idDoctor=$_SESSION['userId'];
                $sCitasD="SELECT u.nombre, dc.fecha, dc.hora from cita as c INNER JOIN usuarios as u ON c.correo_pac=u.correo INNER JOIN u_paciente as p on c.correo_pac=p.correo_pac inner join det_cita as dc on c.id_cita=dc.id_cita WHERE c.id_doctor=$idDoctor and dc.estado='PENDIENTE'";
                $qsCitasD=mysqli_query($con,$sCitasD);
                
                while($rqsCitasd=mysqli_fetch_array($qsCitasD)){ ?>
                  <div class="citac">
                    <div class="citainfo">
                      <div class="titulo"><?php echo $rqsCitasd[0]; ?></div>
                      <div class="subtitulo">Paciente</div>
                      <div class="dates">
                        <h3 class="text">Programada para el día:</h3>
                        <section class="ctfc">
                          <h5 class="fecha"><?php echo $rqsCitasd[1]; ?></h5>
                          <h5 class="horario"><?php echo $rqsCitasd[2];?> Hrs</h5>
                        </section>          
                      </div>
                    </div>
                  </div>
                  <?php
                }
              ?>
            </section>
        </section>

        <section class="citas">
            <h1 class="text">Historial de citas</h1>
            <section class="citaconteiner">
              <?php
              $sHist="SELECT u.nombre, h.fecha, h.hora from historial as h INNER JOIN usuarios as u ON h.correo_pac=u.correo INNER JOIN u_paciente as p on h.correo_pac=p.correo_pac WHERE h.id_doctor=$idDoctor and h.estado='FINALIZADA'; ";
              $qsHist=mysqli_query($con,$sHist);
              
              while($rqsHist=mysqli_fetch_array($qsHist)){ ?>
                <div class="citac">
                  <div class="citainfo">
                    <div class="titulo"><?php echo $rqsHist[0]; ?></div>
                    <div class="subtitulo">Paciente</div>
                    <div class="dates">
                      <h3 class="text">Estado:</h3>
                      <section class="ctfc">
                        <h5 class="fecha">Atendido</h5>
                      </section>          
                    </div>
                    <div class="dates">
                      <h3 class="text">Ocurrió el día:</h3>
                      <section class="ctfc">
                        <h5 class="fecha"><?php echo $rqsHist[1]; ?></h5>
                        <h5 class="horario"><?php echo $rqsHist[2]; ?> Hrs</h5>
                      </section>          
                    </div>
                  </div>
                </div>
                <?php
               }
            ?>
            </section>
        </section>

        <section class="editprf">
            <h1 class="text">Editar perfil</h1>
            <section class="formulario">
              <div class="containerep">
                <div class="titulo">Modifica los campos que quieras actualizar</div>
                <div class="forms">
                  <form action="auth.php" method="POST">
                    <div class="user-details">
                      <div class="input-box">
                        <span class="details">Nombre:</span>
                        <input name="nombre" type="text" placeholder="Nombre actual" required>
                      </div>
                      <div class="input-box">
                        <span class="details">Contraseña:</span>
                        <input name="password" type="password" placeholder="Contraseña actual" required>
                      </div>
                      <div class="input-box">
                        <span class="details">Número de teléfono:</span>
                        <input name="phone" type="text" placeholder="Número actual" required>
                      </div>
                      <div class="input-box">
                        <span class="details">Descripción:</span>
                        <textarea name="longdesc" required></textarea>
                      </div>
                      <div class="input-box">
                        <span class="details">Foto:</span>
                        <input name="foto" type="file" disabled>
                      </div>
                    </div>
                    <input type="hidden" name="api" value="updateDoctor">
                    <div class="buttonep">
                      <input type="submit" value="Actualizar">
                    </div>
                  </form>
                </div>
              </div> 
            </section>
          </section>

    </section>

    <script src="/assets/js/scriptIUP.js"></script>

</body>
</html>