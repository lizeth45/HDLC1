<?php
  include("src/connection/Conexiondb.php");
  $con=conexion();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HDLC Pacientes</title>

        <!--=== CSS ===-->
        <link rel="stylesheet" href="/CSS/style-IUPaciente.css">
        <link rel="shortcut icon" href="/Icons/iconpg.png" type="image/x-icon">
        <link rel="stylesheet" href="/CSS/normalize.css">

        <!-- ===== Link Swiper's CSS ===== -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

       <!-- Fontawesome CDN Link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"/>
        
       <!--=== BoxIcons CSS ===-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <section class="info-docs">
          <span class="overlay"></span>
          <div class="popup">
              <div class="popup-info">
                    <i class='bx bx-info-circle'></i>
                    <h2>Chema Padilla</h2>
                    <h3>Sexólogo</h3>
                    <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, tempora? Delectus voluptate eum reprehenderit sapiente fugiat ratione optio molestiae alias, suscipit sint repudiandae consequuntur doloribus, perferendis fugit ullam saepe molestias.</h4>
                    <div class="buttons">
                      <button class="cerrar-btn">Cerrar</button>
                    </div>
              </div>
              <div class="imagepop">
                    <img src="/Icons/userDoctor.png" alt="docpop1">
              </div>
          </div>
        </section>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="/Icons/HDLC.png" alt="logo">
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
                            <li class="Imenu">
                                <a href="#">
                                    <i class='bx bx-home-alt-2 icon' ></i>
                                    <span class="text nav-text">Menú</span>
                                </a>
                            </li>
                            <li class="Icitas">
                              <a href="#">
                                    <i class='bx bx-bell icon'></i>
                                    <span class="text nav-text">Agendar citas</span>
                              </a>
                            </li>
                            <li class="Icitas-prox">
                                <a href="#">
                                    <i class='bx bx-calendar icon' ></i>
                                    <span class="text nav-text">Citas próximas</span>
                                </a>
                            </li>
                            <li class="Iperfil">
                                <a href="#">
                                    <i class='bx bx-cog icon' ></i>
                                    <span class="text nav-text">Editar perfil</span>
                                </a>
                            </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="#">
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
                                        <img src="/Icons/userDoctor.png" alt="doc1">
                                      </div>
                          
                                      <div class="name-profession">
                                        <span class="name"><?php echo $nombre_Doc ?></span>
                                        <span class="profession"><?php echo $especialidad ?></span>
                                      </div>
                          
                                      <div class="button">
                                        <button class="aboutMe" data-id="<?php echo $idDoc ?>">Acerca de mi</button>
                                        <button class="hireMe">Citar</button>
                                      </div>
                                    </div>
                                  </div>  <?php
                                }                            
                              ?>
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
                      <form action="#">
                        <div class="user-details">
                          <div class="input-box">
                            <span class="details">Correo:</span>
                            <input type="text" placeholder="Ingresa tu correo..." required>
                          </div>
                          <div class="input-box">
                            <span class="details">Asunto:</span>
                            <input type="text" placeholder="Describe el motivo..." required>
                          </div>
                          <div class="input-box">
                            <span class="details">Fecha:</span>
                            <input type="date" placeholder="Ingresa el dia de tu consulta..." required>
                          </div>
                          <div class="input-box">
                            <span class="details">Hora:</span>
                            <select name="hora" aria-label="Default select example">
                                <option selected>Elige la hora...</option>
                                <option value="1">08:00</option>
                                <option value="2">09:00</option>
                                <option value="3">10:00</option>
                                <option value="4">11:00</option>
                                <option value="5">12:00</option>
                                <option value="6">13:00</option>
                                <option value="7">14:00</option>
                            </select>
                          </div>
                          <div class="input-box">
                            <span class="details">Doctor:</span>
                            <input type="text" placeholder="Selecciona al doctor..." required>
                          </div>
                        </div>
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
                  <div class="citac">
                    <div class="image">
                      <img src="/Icons/sylvie.jpeg" alt="doc1">
                    </div>
                    <div class="citainfo">
                      <div class="titulo">Chema Padilla</div>
                      <div class="subtitulo">Sexólogo</div>
                    </div>
                    <div class="cancelar">
                      <button class="cancelarBtn">Cancelar</button>
                    </div>
                  </div>
                </section>
              </section>
              
        </section>

        <script src="/src/JS/scriptIUP.js"></script>

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