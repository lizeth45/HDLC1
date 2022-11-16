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
      aboutMeBtn = document.querySelector(".aboutMe");

      aboutMeBtn.addEventListener("click", () => infoDocs.classList.add("active"));
      cerrarBtn.addEventListener("click", () => infoDocs.classList.remove("active"));
      overlay.addEventListener("click", () => infoDocs.classList.remove("active"));

const imenu = document.querySelector(".Imenu"),
      icitas = document.querySelector(".Icitas"),
      icitasprox = document.querySelector(".Icitas-prox"),
      iperfil = document.querySelector(".Iperfil");
      citarBtn = document.querySelector(".hireMe")

      imenu.addEventListener("click", () => container.classList.add("menu"));
      imenu.addEventListener("click", () => container.classList.remove("cita"));
      imenu.addEventListener("click", () => container.classList.remove("ctpr"));
      imenu.addEventListener("click", () => container.classList.remove("perfil"));

      citarBtn.addEventListener("click", () => container.classList.add("cita"));
      citarBtn.addEventListener("click", () => container.classList.remove("menu"));
      citarBtn.addEventListener("click", () => container.classList.remove("ctpr"));
      citarBtn.addEventListener("click", () => container.classList.remove("perfil"));

      icitas.addEventListener("click", () => container.classList.add("cita"));
      icitas.addEventListener("click", () => container.classList.remove("menu"));
      icitas.addEventListener("click", () => container.classList.remove("ctpr"));
      icitas.addEventListener("click", () => container.classList.remove("perfil"));

      icitasprox.addEventListener("click", () => container.classList.add("ctpr"));
      icitasprox.addEventListener("click", () => container.classList.remove("menu"));
      icitasprox.addEventListener("click", () => container.classList.remove("cita"));
      icitasprox.addEventListener("click", () => container.classList.remove("perfil"));

      iperfil.addEventListener("click", () => container.classList.add("perfil"));
      iperfil.addEventListener("click", () => container.classList.remove("menu"));
      iperfil.addEventListener("click", () => container.classList.remove("cita"));
      iperfil.addEventListener("click", () => container.classList.remove("ctpr"));
