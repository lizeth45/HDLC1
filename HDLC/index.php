<?php
  session_start();
  include("src/common/include.php");
?>
<!DOCTYPE html>
<html lang="en">
  <?= Head("Hospital de la Cruz", [
    "/assets/css/style-index.css"
  ]) ?>
  <body>
    <header class="hero">
        <nav class="nav container"> 

          <div class="nav_logotipo">
            <img src="/assets/icons/HDLC.png" alt="" class="nav_logoicon">
          </div>

            <div class="nav_logo">
                <h2 class="nav_title">Hospital De La Cruz</h2>
            </div>
                
            <ul class="nav_link nav_link--menu">
                <li class="nav_items">
                    <a href="#Inicio" class="nav_links">Inicio</a>
                </li>
                <li class="nav_items">
                    <a href="#Acerca_de" class="nav_links">Acerca de</a>
                </li>
                <li class="nav_items">
                    <a href="login.php" class="nav_links">Iniciar Sesión</a>
                </li>
            </ul>
        </nav>

        <section class="hero_container container">
            <h1 class="hero_title">¿Cansado(a) de hacer filas para tramitar una cita médica?</h1>
            <p class="hero_paragraph">Con esta herramienta digital podrás agendar una cita desde la comodidad de tu hogar sin necesidad de acudir al hospital.</p>
            <a href="register.php" class="cta">Registrate</a>
        </section>
    </header>

    <main>
      <section class="container about" id="Inicio">
        <h2 class="subtitle">¿Qué podrás encontrar en nuestra página web?</h2>
        <p class="about_paragraph">El sitio web del Hospital De La Cruz cuenta con un sistema de control de:</p>
        <div class="about_main">
          <article class="about_icons">
            <img src="/assets/icons/usuarios.png" alt="" class="about_icon">
            <h3 class="about_title">Usuarios</h3>
            <p class="about_paragraph">Un sistema donde se controlen los datos de cada usuario de manera segura y privada. Asu vez que se otorgue la libertad de que cada uno pueda modificar información personal de manera intuitiva.</p>
          </article>

          <article class="about_icons">
            <img src="/assets/icons/Doctores.png" alt="" class="about_icon">
            <h3 class="about_title">Doctores</h3>
            <p class="about_paragraph">
                - Personal entrenado y capacitado.<br>
                - Cuidado de calidad.<br>
                - Equipamiento moderno y seguro.<br>
                - Uso de medicamentos apropiados.<br>
                - Uso de nuevas tecnología.
            </p>
          </article>

          <article class="about_icons">
            <img src="/assets/icons/pacientes.png" alt="" class="about_icon">
            <h3 class="about_title">Pacientes</h3>
            <p class="about_paragraph">En en Hospital De La Cruz, se busca que los pacientes puedan confiar en que se les brindará ayuda en casos de emergencia y cuidados médicos, independientemente de la situación.
            </p>
          </article>
        </div>
      </section>

      <section class="knowledge" id="Acerca_de">
        <div class="knowledge_container container">
          <div class="knowledge_texts">
            <h2 class="subtitle">Acerca de nosotros...</h2>
            <p class="knowledge_paragraph">Misión <br>
              En el Hospital de la Cruz, somos una Gran Familia dedicada a promover y recuperar la salud de nuestros pacientes, brindando una atención con eficacia, eficiencia y amabilidad, desarrollando nuestras actividades con altos niveles de seguridad, calidad y excelencia.<br><br>
              Visión<br>
              Consolidarnos como un hospital certificado por el Consejo de Salubridad General, de excelente prestigio cuyo modelo de atención al paciente, de organización y gestión se distinga por su ética, calidad, calidez y seguridad en el servicio, comprometidos siempre por el desarrollo tecnológico, profesional y humano de la organización.
          </p>
          </div>

          <figure class="knowledge_picture">
            <img src="/assets/icons/hospital-abt.png" alt="" class="knowledge_img">
          </figure>
        </div>
      </section>
    </main>
  </body>
</html>