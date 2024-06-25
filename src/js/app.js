document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkMode();
  sidebar();
  //limpiarErrores();
});
function elegirModo() {
  if (
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches &&
    localStorage.getItem("modo") === "claro"
  ) {
    document.body.classList.remove("dark-mode");
  } else if (
    (window.matchMedia &&
      window.matchMedia("(prefers-color-scheme: dark)").matches) ||
    localStorage.getItem("modo") === "oscuro"
  ) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
}
function darkMode() {
  const botonDarkMode = document.querySelector(".dark-mode-boton");
  const isDarkMode = localStorage.getItem("darkMode"); // Obtener el estado actual del modo oscuro desde localStorage

  if (isDarkMode === "enabled") {
    document.body.classList.add("dark-mode");
  }

  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");

    // Guardar el estado del modo oscuro en localStorage
    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("darkMode", "enabled");
    } else {
      localStorage.setItem("darkMode", "disabled");
    }
  });
}
function cambiarAOscuro() {
  const navegacion = document.querySelector(".body"); // Creando un selector

  document.body.classList.toggle("dark-mode");
}
function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", navegacionResponsive);

  //Muestra campos condicionales
  const metodoInformar = document.querySelectorAll(
    'input[name="informar[contacto]"]'
  );
  metodoInformar.forEach((input) =>
    input.addEventListener("click", mostrarMetodosContacto)
  );
  console.log(metodoInformar);
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");

  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
  } else {
    navegacion.classList.add("mostrar");
  }
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
    <label for="Numero de Telefono">Telefono</label>
    <input type="tel" placeholder="Tu Telefono" id="telefono" name="informar[telefono]" required />

        <p>Elija la fecha y la hora Para la llamada</p>

          <label for="fecha">Fecha</label>
          <input type="date" id="fecha"  name="informar[fecha]" />

          <label for="hora">Hora:</label>
          <input type="time" id="hora" min="08:00" max="18:00"  name="informar[hora]" />
    `;
  } else {
    contactoDiv.innerHTML = `
          <label for="email">E-mail</label>
          <input type="email" placeholder="Tu Email" id="email" name="informar[email]" required/>
    `;
  }
}
//No funciona
// function limpiarErrores() {
//   const errores = document.querySelectorAll(".alerta");

//   if (errores.length !== null) {
//     errores.forEach((error) => {
//       setTimeout(() => {
//         error.remove();
//       }, 5000);
//     });
//   }
// }
function sidebar() {
  let btn = document.querySelector('#btn');
  let sidebar = document.querySelector('.sidebar');

  if (btn && sidebar) {
    btn.onclick = function () {
      sidebar.classList.toggle('active');
    };
  }
}
document.addEventListener("DOMContentLoaded", function() {
  const buscador = document.getElementById("buscador");
  const mensajeBusqueda = document.getElementById("mensaje-busqueda");
  const titulosSecciones = document.querySelectorAll(".titulo-seccion");
  const contenedorAnuncios = document.querySelector(".contenedor-anuncios");

  buscador.addEventListener("keyup", function(e) {
      const busqueda = this.value.toLowerCase().trim();
      let proyectosEncontrados = 0;

      document.querySelectorAll(".anuncio").forEach(proyecto => {
          const titulo = proyecto.querySelector(".titulo");
          if (titulo) {
              if (busqueda === "" || titulo.textContent.toLowerCase().includes(busqueda)) {
                  proyecto.style.display = "";
                  titulo.classList.toggle("resaltarColor", busqueda !== "");
                  proyectosEncontrados++;
              } else {
                  proyecto.style.display = "none";
                  titulo.classList.remove("resaltarColor");
              }
          }
      });

      // Ajustar el grid
      contenedorAnuncios.style.gridTemplateColumns = proyectosEncontrados > 0 ? "repeat(auto-fill, minmax(300px, 1fr))" : "1fr";

      // Mostrar o ocultar el mensaje de búsqueda y los títulos de sección
      if (proyectosEncontrados === 0 && busqueda !== "") {
          mensajeBusqueda.style.display = "block";
          titulosSecciones.forEach(titulo => titulo.style.display = "none");
      } else {
          mensajeBusqueda.style.display = "none";
          titulosSecciones.forEach(titulo => titulo.style.display = "");
      }

      // Limpiar la búsqueda si se presiona Escape
      if (e.key === "Escape") {
          this.value = "";
          this.dispatchEvent(new Event('keyup'));
      }
  });
});