<main class="contenedor seccion contenido-centrado">


    <h1><?php echo $proyecto->titulo; ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $proyecto->imagen; ?>" alt="imagen del proyecto" />


    <div class="resumen-proyecto anuncio">
      <p class="precio">$<?php echo $proyecto->precio; ?></p>

      <p> <?php echo $proyecto->descripcion; ?></p>
    </div>

</main>