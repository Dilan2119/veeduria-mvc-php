<div class="contenedor-anuncios">
    <?php foreach($proyectos_ejecucion as $proyecto){ ?>
        <div class="anuncio">
            <img loading="lazy" src="/imagenes/<?php echo $proyecto->imagen; ?>" alt="anuncio" />

            <div class="contenido-anuncio">
                <h3 class="titulo"><?php echo $proyecto->nombre; ?></h3>
                <p class="card-description"><?php echo substr($proyecto->descripcion, 0, 100); ?></p>
                <p class="precio">$<?php echo number_format($proyecto->inversion, 0, ',', '.'); ?></p>
                
                <!-- Agregar la barra de progreso aquí -->
            <div class="progress" role="progressbar" aria-label="Progreso del proyecto" aria-valuenow="<?php echo $proyecto->progreso; ?>" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-success" style="width: <?php echo $proyecto->progreso; ?>%"><?php echo $proyecto->progreso; ?>%</div>
            </div>
                

                <a href="/proyectos_ejecucion?id=<?php echo $proyecto->id; ?>" class="boton-amarillo-block" href="proyectos.html">Ver proyecto </a>
            </div><!-- .contenido-anuncio -->
        </div> <!-- anuncio -->
    <?php } ?>
</div><!-- contenedor-anuncios -->