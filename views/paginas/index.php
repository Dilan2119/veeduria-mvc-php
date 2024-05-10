<main class="contenedor seccion">
      <h1>Mas Sobre Nosotros</h1>
      <?php include 'iconos.php';?>
    </main>
    <section class="seccion contenedor">
      <h2>Proyectos en Ejecucion</h2>


      <?php
      include 'listado.php';
      ?>

        
      <div class="alinear-derecha">
        <a href="/proyectos" class="boton-verde">Ver todos</a>
      </div>
    </section>

    <section class="imagen-contacto">
      <h2>Aporta a la transparencia de tu municipio</h2>
      <p>
        Completa el formulario de informe para compartir tus inquietudes o
        reportar cualquier anomalía.
      </p>
      <a href="/informar" class="boton-amarillo">Informanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
      <section class="proposito">
        <h3>Proposito</h3>
        <article class="entrada-proposito">
          <div class="imagen">
            <picture>
              <source
                srcset="build/img/binoculares.webp"
                type="image/webp"
              />
              <source
                srcset="build/img/binoculares.jpeg"
                type="image/jpeg"
              />
              <img
                loading="lazy"
                src="build/img/binoculares.jpeg"
                alt="Imagen con binaculares"
              />
            </picture>
          </div>
          <div class="texto-entrada">
            <a href="/admin">
              <h4>
                Vigilancia Ciudadana: Observando el Horizonte del Zulia en Norte de
                Santander
              </h4>
              <p>
                Escrito el: <span>27/03/2024</span>por:<span>Admin</span>
              </p>
              <p>
                Los binoculares simbolizan la vigilancia ciudadana, mientras observan
                atentamente la bandera del Zulia en Norte de Santander.
              </p>
            </a>
          </div>
        </article>
      </section>
      <section class="Testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
          <blockquote>
            La veeduría ciudadana es la columna vertebral de la democracia, el
            poder del pueblo ejercido de forma responsable y vigilante.
          </blockquote>
          <p>-Jorge Enrique Robledo, político colombiano.</p>
        </div>
      </section>
      
    </div> 