<?php
  session_start();
  if(!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    Header("Location: /");
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
                <li class="search-box">
                    <i class='bx bx-search-alt icon' ></i>
                        <input type="text" placeholder="Buscar...">
                </li>
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
                <div class="citac">
                    <div class="citainfo">
                      <div class="titulo">Chema Padilla</div>
                      <div class="subtitulo">Paciente</div>
                      <div class="dates">
                        <h3 class="text">Programada para el día:</h3>
                        <section class="ctfc">
                          <h5 class="fecha">14/09/2001</h5>
                          <h5 class="horario">13:00 Hrs</h5>
                        </section>          
                      </div>
                    </div>
                  </div>
            </section>
        </section>

        <section class="citas">
            <h1 class="text">Historial de citas</h1>
            <section class="citaconteiner">
                <div class="citac">
                    <div class="citainfo">
                      <div class="titulo">Chema Padilla</div>
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
                          <h5 class="fecha">14/09/2001</h5>
                          <h5 class="horario">13:00 Hrs</h5>
                        </section>          
                      </div>
                    </div>
                  </div>
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