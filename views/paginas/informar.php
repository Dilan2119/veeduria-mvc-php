<main class="contenedor seccion">
      <h1 class="titulo">informar</h1>

      <?php if($mensaje) { ?>
         <p class= 'alerta exito'> <?php echo $mensaje; ?></p>
     <?php  } ?>

      <picture>
        <source srcset="build/img/escudo2.webp" type="image/webp" />
        <source srcset="build/img/escudo2.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/escudo2.jpg"
          alt="Imagen escudo"
        />
      </picture>
      <h2>LLene el formulario</h2>
      <form class="formulario" action="/informar" method="POST" enctype="multipart/form-data">
        <fieldset class="casilla">
          <legend>Informacion Personal</legend>
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Tu Nombre" id="nombre" name="informar[nombre]" required />

          

         
        </fieldset>
        <fieldset class="casilla">
          <legend>Informacion sobre el proyecto</legend>

          <label for="opciones"> En Ejecucion o Concluido:</label>
          <select id="opciones" name="informar[tipo]" required>
            <option value="" disabled selected>-- Seleccione --</option>
            <option value="Ejecucion">En Ejecucion</option>
            <option value="Concluido">Concluido</option>
          </select>

          <label for="nombre">Mensaje</label>
          <textarea id="mensaje" name="informar[mensaje]" required ></textarea>
        </fieldset>

        <fieldset class="casilla">
          <legend>Informacion sobre el proyecto</legend>
          <p>Como desea ser Contactado</p>
          <div class="forma-contacto">
            
            <label for="contactar-telefono">Telefono</label>
            <input  type="radio" value="telefono" id="contactactar-telefono" name="informar[contacto]" required  />

            <label for="contactar-email">E-mail</label>
            <input  type="radio" value="email" id="contactactar-email" name="informar[contacto]" required  />
          </div>

          <div id="contacto"></div>

          
            
          
          

          
        </fieldset>

        <span>Adjunte un archivo*</span>
            <input type="file" name="adjunto">
        <input type="submit" value="Enviar" class="boton-verde" />
      </form>
    </main>
