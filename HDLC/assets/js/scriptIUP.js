const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwtich = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

      toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");
      });

      searchBtn.addEventListener("click", () =>{
        sidebar.classList.remove("close");
      });

      modeSwtich.addEventListener("click", () =>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
            modeText.innerText = "Light Mode"
        }else{
            modeText.innerText = "Dark Mode"
        }
      });

const container = document.querySelector(".iupac");

const home = document.querySelector(".home"),
      citas = document.querySelector(".citas");

const infoDocs = document.querySelector(".info-docs"),
      overlay = document.querySelector(".overlay"),
      cerrarBtn = document.querySelector(".cerrar-btn"),
      aboutMeBtn = document.querySelectorAll('.aboutMe');
      aboutMeBtn.forEach((btn) =>{
        btn.addEventListener('click', () => {
            infoDocs.classList.add("active");
        });

      });

      cerrarBtn.addEventListener("click", () => infoDocs.classList.remove("active"));
      overlay.addEventListener("click", () => infoDocs.classList.remove("active"));

const imenu = document.querySelector(".Imenu"),
      icitas = document.querySelector(".Icitas"),
      icitasprox = document.querySelector(".Icitas-prox"),
      iperfil = document.querySelector(".Iperfil"),
      citarBtn = document.querySelectorAll('.hireMe');
      citarBtn.forEach((btn) =>{
        btn.addEventListener('click', () => {
            navigateTo('cita');
        });
      });

      imenu.addEventListener("click", () => navigateTo('menu'));
      icitas.addEventListener("click", () => navigateTo('cita'));
      icitasprox.addEventListener("click", () => navigateTo('ctpr'));
      iperfil.addEventListener("click", () => navigateTo('perfil'));

      function navigateTo(route){
        container.className='iupac ' + route
      }