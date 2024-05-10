<?php
 use App\Proyecto;
 
 if($_SERVER['SCRIPT_NAME'] === '/veeduriadigital/proyectos.php') {
    $proyectos = Proyecto::all();
 }else{
    $proyectos = Proyecto::get(3);
 }
?>

<div class="contenedor-anuncios">
    <?php foreach($proyectos as $proyecto){ ?>
        <div class="anuncio">
            <img loading="lazy" src="/veeduriadigital/imagenes/<?php echo $proyecto->imagen; ?>" alt="anuncio" />

            <div class="contenido-anuncio">
                <h3><?php echo $proyecto->titulo; ?></h3>
                <p><?php echo substr($proyecto->descripcion, 0, 50); ?></p>
                <p class="precio">$<?php echo $proyecto->precio; ?></p>

                <a href="proyecto.php?id=<?php echo $proyecto->id; ?>" class="boton-amarillo-block" href="proyectos.html">Ver proyecto </a>
            </div><!-- .contenido-anuncio -->
        </div> <!-- anuncio -->
    <?php } ?>
</div><!-- contenedor-anuncios -->
