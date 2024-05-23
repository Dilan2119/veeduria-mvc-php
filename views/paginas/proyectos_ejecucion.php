<main class="contenedor seccion contenido-centrado">


    <h1 class="titulo" ><?php echo $proyectos_ejecucion->nombre; ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $proyectos_ejecucion->imagen; ?>" alt="imagen del proyecto" />


    <div class="resumen-proyecto anuncio">
      <p class="fecha">Fecha de Inicio: <?php echo $proyectos_ejecucion->fecha_inicio; ?></p>
      <p class="precio">$<?php echo number_format($proyectos_ejecucion->inversion, 0, ',', '.'); ?></p>

      <p> <?php echo $proyectos_ejecucion->descripcion; ?></p>

      <h3>Estado del Proyecto</h3>
      <div class="progress" role="progressbar" aria-label="Progreso del proyecto" aria-valuenow="<?php echo $proyectos_ejecucion->progreso; ?>" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-success" style="width: <?php echo $proyectos_ejecucion->progreso; ?>%"><?php echo $proyectos_ejecucion->progreso; ?>%</div>
            </div>

    </div>

</main>