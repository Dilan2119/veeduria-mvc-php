<main class="contenedor seccion contenido-centrado">
    <h1 class="titulo"><?php echo $historial->titulo; ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $historial->imagen; ?>" alt="imagen del proyecto" />

    <div class="resumen-proyecto anuncio">
        <p class="fecha">Realizada el : <?php echo $historial->fecha_inicio; ?></p>

        <p><?php echo $historial->descripcion; ?></p>

        <?php if($historial->documento): ?>
            <div class="documento">
                <h3>Documento adjunto</h3>
                <a href="/documentos/<?php echo $historial->documento; ?>" target="_blank" class="boton-documento">
                    Ver documento
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>