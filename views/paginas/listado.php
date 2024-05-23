<div class="contenedor-anuncios">
    <?php foreach($proyectos as $proyecto){ ?>
        <div class="anuncio">
            <img loading="lazy" src="/imagenes/<?php echo $proyecto->imagen; ?>" alt="anuncio" />

            <div class="contenido-anuncio">
                <h3 class="titulo"><?php echo $proyecto->titulo; ?></h3>
                <p class="card-description"><?php echo substr($proyecto->descripcion, 0, 100); ?></p>
                <p class="precio">$<?php echo number_format($proyecto->precio, 0, ',', '.'); ?></p>


                <a href="/proyecto?id=<?php echo $proyecto->id; ?>" class="boton-amarillo-block" href="proyectos.html">Ver proyecto </a>
            </div><!-- .contenido-anuncio -->
        </div> <!-- anuncio -->
    <?php } ?>
</div><!-- contenedor-anuncios -->