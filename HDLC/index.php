<?php
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
            <!-- <a href="/src/SelecTU.php" class="cta">Registrate</a> -->
            <a href="#" class="cta">Registrate</a>
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
            <p class="about_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto et incidunt aliquid quos.</p>
          </article>

          <article class="about_icons">
            <img src="/assets/icons/Doctores.png" alt="" class="about_icon">
            <h3 class="about_title">Doctores</h3>
            <p class="about_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto et incidunt aliquid quos.</p>
          </article>

          <article class="about_icons">
            <img src="/assets/icons/pacientes.png" alt="" class="about_icon">
            <h3 class="about_title">Pacientes</h3>
            <p class="about_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto et incidunt aliquid quos.</p>
          </article>
        </div>
      </section>

      <section class="knowledge" id="Acerca_de">
        <div class="knowledge_container container">
          <div class="knowledge_texts">
            <h2 class="subtitle">Acerca de nosotros...</h2>
            <p class="knowledge_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptates sequi at harum enim nostrum beatae sint, perspiciatis nam tenetur fugit amet dignissimos, minima sapiente officia adipisci quasi quibusdam laudantium.</p>
          </div>

          <figure class="knowledge_picture">
            <img src="/assets/icons/hospital-abt.png" alt="" class="knowledge_img">
          </figure>
        </div>
      </section>
    </main>
  </body>
</html>