document.addEventListener("DOMContentLoaded", () => {
  // Check for darkMode state on localStorage
  if (localStorage.getItem("darkMode") === "active") body.classList.toggle("dark");
});

const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      modeSwtich = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

if(toggle){
  toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});
}

if(sidebar){
  sidebar.addEventListener("mouseenter", ()=>{

    sidebar.classList.remove("close");
  })
  
  sidebar.addEventListener("mouseleave", ()=>{
  
    sidebar.classList.add("close");
  })
}


if(modeSwtich){
  modeSwtich.addEventListener("click", () => {
    body.classList.toggle("dark");
  
    localStorage.setItem("darkMode", body.classList.contains("dark") ? "active" : "inactive");
  
    if (body.classList.contains("dark")) {
      modeText.innerText = "Light Mode"
    } else {
      modeText.innerText = "Dark Mode"
    }
  });
}


const container = document.querySelector(".iupac");

const home = document.querySelector(".home"),
  citas = document.querySelector(".citas");

const infoDocs = document.querySelector(".info-docs"),
  overlay = document.querySelector(".overlay"),
  cerrarBtn = document.querySelector(".cerrar-btn"),
  aboutMeBtn = document.querySelectorAll('.aboutMe');
aboutMeBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    infoDocs.classList.add("active");
  });
});
if(cerrarBtn){
  cerrarBtn.addEventListener("click", () => infoDocs.classList.remove("active"));
}

if(overlay){
  overlay.addEventListener("click", () => infoDocs.classList.remove("active"));
}

const imenu = document.querySelector(".Imenu"),
      icitas = document.querySelector(".Icitas"),
      icitasprox = document.querySelector(".Icitas-prox"),
      iperfil = document.querySelector(".Iperfil"),
      citarBtn = document.querySelectorAll('.hireMe');
if(citarBtn){
  citarBtn.forEach((btn) => {
    btn.addEventListener('click', () => {
      navigateTo('cita');
    });
  });
}

if(imenu) imenu.addEventListener("click", () => navigateTo('menu'));
if(icitas) icitas.addEventListener("click", () => navigateTo('cita'));
if(icitasprox) icitasprox.addEventListener("click", () => navigateTo('ctpr'));
if(iperfil) iperfil.addEventListener("click", () => navigateTo('perfil'));

function navigateTo(route) {
  container.className = 'iupac ' + route
}

function CancelarCitaPac(button) {
  const value = button.dataset.id;

  fetch("deleteCita.php?" + new URLSearchParams({ value }))
    .then(data => {
      location.reload();
    });
}

function RequestDoctorDetail(button) {
  const value = button.dataset.id;

  fetch("DoctorDetail.php?" + new URLSearchParams({ value }))
    .then(response => response.json()).then(data => {
      console.log("RESPONSE FROM SERVER", data);
      document.querySelector(".info-docs .doctor-name").innerText = data.nombre;
      document.querySelector(".info-docs .doctor-spec").innerText = data.descripcion;
      document.querySelector(".info-docs .long-desc").innerText = data.infoDoc;
      document.querySelector(".info-docs .doctor-image").src = data.foto;
    });
}

function removeActive(buttonCerrar) {
  console.log('removeActive()');
  const infoDocs = document.querySelector(".info-docs")
  infoDocs.classList.remove("active");
}

function toggleRegisterForm(selectBox) {
  const doctorForm = document.querySelector(".doctor-form-container");
  const patientForm = document.querySelector(".patient-form-container");

  if(selectBox.value === "DOCTOR") {
    doctorForm.classList.remove('hide');
    patientForm.classList.add('hide');
  } else {
    doctorForm.classList.add('hide');
    patientForm.classList.remove('hide');
  }
}