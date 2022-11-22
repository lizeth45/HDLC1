<?php
  session_start();
  if(!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    Header("Location: /");
  }
  if($_SESSION['userType']!="paciente"){
    Header("Location: /doctor.php");
  }
  include("src/common/include.php");
  include("src/apis/databaseConnection.php");
  $con = connect();
?>
<!DOCTYPE html>
<html lang="en">
  <?= Head("Pacientes", [
    "assets/css/style-IUPaciente.css"
  ]) ?>
  <body>
      <section class="info-docs">
        <span class="overlay"></span>
        <div class="popup">
            <div class="popup-info">
                  <i class='bx bx-info-circle'></i>
                  <h2 class="doctor-name">Chema Padilla</h2>
                  <h3 class="doctor-spec">Sexólogo</h3>
                  <h4 class="long-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, tempora? Delectus voluptate eum reprehenderit sapiente fugiat ratione optio molestiae alias, suscipit sint repudiandae consequuntur doloribus, perferendis fugit ullam saepe molestias.</h4>
                  <div class="buttons">
                    <button class="cerrar-btn">Cerrar</button>
                  </div>
            </div>
            <div class="imagepop">
                  <img src="/assets/icons/userDoctor.png" alt="docpop1" class="doctor-image">
            </div>
        </div>
      </section>
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
                          <li class="Imenu">
                              <a href="javascript:void(0);">
                                  <i class='bx bx-home-alt-2 icon' ></i>
                                  <span class="text nav-text">Menú</span>
                              </a>
                          </li>
                          <li class="Icitas">
                            <a href="javascript:void(0);">
                                  <i class='bx bx-bell icon'></i>
                                  <span class="text nav-text">Agendar citas</span>
                            </a>
                          </li>
                          <li class="Icitas-prox">
                              <a href="javascript:void(0);">
                                  <i class='bx bx-calendar icon' ></i>
                                  <span class="text nav-text">Citas próximas</span>
                              </a>
                          </li>
                          <li class="Iperfil">
                              <a href="javascript:void(0);">
                                  <i class='bx bx-cog icon' ></i>
                                  <span class="text nav-text">Editar perfil</span>
                              </a>
                          </li>
                  </ul>
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
      <section class="iupac">

            <section class="home">
                  <h1 class="text">Menú</h1>
                  <h1 class="hero_title">Doctores:</h1>
                  <div class="docs">
                      <div class="swiper mySwiper container">
                          <div class="swiper-wrapper content">
                    
                          <?php
                              $sentencia="SELECT d.id_doctor, u.nombre, e.descripcion from usuarios as u join u_doctor as d on u.correo=d.correo_doc JOIN especialidad as e on d.id_esp=e.id_esp";
                              $query=mysqli_query($con,$sentencia);
                              while ($row=mysqli_fetch_array($query)) {
                                $idDoc=$row['id_doctor'];
                                $nombre_Doc=$row['nombre'];
                                $especialidad=$row['descripcion'];   ?>
                                
                                <div class="swiper-slide card">
                                  <div class="card-content">
                                    <div class="image"> <!--Aqui faltaria la URLdelaImagen-->
                                      <img src="/assets/icons/userDoctor.png" alt="doc1">
                                    </div>
                        
                                    <div class="name-profession">
                                      <span class="name"><?php echo $nombre_Doc ?></span>
                                      <span class="profession"><?php echo $especialidad ?></span>
                                    </div>
                        
                                    <div class="button">
                                      <button class="aboutMe" data-id="<?php echo $idDoc ?>" onclick="RequestDoctorDetail(this)">Acerca de mi</button>
                                      <button class="hireMe">Citar</button>
                                    </div>
                                  </div>
                                </div>
                          <?php } ?>
                            <!--Aqui termina la carta del doc-->         
                          </div>
                      </div>
          
                      <div class="swiper-button-next"></div>
                      <div class="swiper-button-prev"></div>
                      <div class="swiper-pagination"></div>
                    </div>
            </section>

            <section class="citas">
              <h1 class="text">Citas</h1>
              <section class="formulario">
                <div class="containerc">
                  <div class="titulo">Agenda una cita</div>
                  <div class="forms">
                    <form action="auth.php" method="POST">
                      <div class="user-details">
                        <div class="input-box">
                          <span class="details">Nombre:</span>
                            <?php
                            $idUsuario=$_SESSION['userId'];
                            $selectBP="SELECT u.nombre from usuarios as u inner join u_paciente as p on p.correo_pac=u.correo where p.id_paciente=$idUsuario";
                            $qBP=mysqli_query($con,$selectBP);
                            $rNamePaciente=mysqli_fetch_array($qBP); 
                            
                            echo "<input name=\"name\" type=\"text\" value=\"$rNamePaciente[0]\" readonly>";
                            ?> 
                        </div>
                        <div class="input-box">
                          <span class="details">Asunto:</span>
                          <input name="motive" type="text" placeholder="Describe el motivo..." required>
                        </div>
                        <div class="input-box">
                          <span class="details">Fecha:</span>
                          <input name="date" type="date" placeholder="Ingresa el dia de tu consulta..." required>
                        </div>
                        <div class="input-box">
                          <span class="details">Hora:</span>
                          <select name="hora" aria-label="Default select example">
                              <option selected>Elige la hora...</option>
                              <option value="08:00">08:00</option>
                              <option value="09:00">09:00</option>
                              <option value="10:00">10:00</option>
                              <option value="11:00">11:00</option>
                              <option value="12:00">12:00</option>
                              <option value="13:00">13:00</option>
                              <option value="14:00">14:00</option>
                          </select>
                        </div>
                        <div class="input-box">
                          <span class="details">Doctor:</span>
                          <select name="doctor" aria-label="Default select example">
                            <option selected>Selecciona al doctor...</option>

                                <?php
                                    $sentenciaDoc="SELECT u.nombre, d.id_doctor FROM usuarios as u inner join u_doctor as d on u.correo=d.correo_doc";
                                    $queryDOC=mysqli_query($con,$sentenciaDoc);
                                    while($rowDoc=mysqli_fetch_array($queryDOC)){
                                        $idDoc=$rowDoc['id_doctor'];
                                        $NameDoc=$rowDoc['nombre'];
                                        ?>
                                        <option value="<?php echo $NameDoc; ?> "> <?php echo $NameDoc?>  </option>
                                        <?php
                                    }
                                ?> 
                          </select>
                        </div>
                      </div>
                      <input type="hidden" name="api" value="generateAppointment" />
                      <div class="buttonc">
                        <input type="submit" value="Agendar">
                      </div>
                    </form>
                  </div>
                </div> 
              </section>
            </section>

            <section class="agendar">
                <h1 class="text">Calendario de citas</h1>
                <section class="citaconteiner">
                <?php
                    $idPaciente=$_SESSION['userId'];
                    $sCitasP="SELECT c.id_cita, u.nombre, e.descripcion , dc.fecha, dc.hora from cita as c INNER JOIN usuarios as u ON c.correo_doc=u.correo INNER JOIN u_doctor as d on c.correo_doc=d.correo_doc inner join det_cita as dc on dc.id_cita=c.id_cita INNER join especialidad as e on d.id_esp=e.id_esp WHERE c.id_paciente=$idPaciente";
                    $qsCitasP=mysqli_query($con,$sCitasP);

                    while($rqsCitasP=mysqli_fetch_array($qsCitasP)){
                      ?>
                      <div class="citac">
                        <div class="image">
                          <img src="/assets/icons/userDoctor.png" alt="doc1">
                        </div>
                        <div class="citainfo">
                          <div class="titulo"><?php echo $rqsCitasP[1]; ?></div>
                          <div class="subtitulo"><?php echo $rqsCitasP[2]; ?></div>
                          <div class="dates">
                            <h3 class="text">Programada para el día:</h3>
                            <section class="ctfc">
                              <h5 class="fecha"><?php echo $rqsCitasP[3]; ?></h5>
                              <h5 class="horario"><?php echo $rqsCitasP[4]; ?> Hrs</h5>
                            </section>
                          </div>
                        </div>
                        <div class="cancelar">
                          <button class="cancelarBtn" data-id="<?php echo $rqsCitasP[0]; ?>" onclick="CancelarCitaPac(this)" >Cancelar</button>
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
                            <input name="name" type="text" placeholder="Nombre" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Contraseña:</span>
                            <input name="password" type="password" placeholder="Contraseña" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Número de teléfono:</span>
                            <input name="phone" type="text" placeholder="Número" required>
                          </div>
                        </div>
                        <input type="hidden" name="api" value="updatePatient" />
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

      <!-- Swiper JS -->
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

      <!-- Initialize Swiper -->
      <script>
          var swiper = new Swiper(".mySwiper", {
          slidesPerView: 3,
          spaceBetween: 30,
          slidesPerGroup: 3,
          loop: true,
          loopFillGroupWithBlank: true,
          pagination: {
              el: ".swiper-pagination",
              clickable: true,
          },
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
          });
      </script>
  </body>
</html>