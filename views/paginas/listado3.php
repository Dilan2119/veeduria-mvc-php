
<article class="entrada-proposito">
<?php foreach($historial as $historia){ ?>
        <div class="imagen">
            <picture>
                
                <img  loading="lazy" src="/imagenes/<?php echo $historia->imagen; ?>" alt="anuncio" />
            </picture>
        </div>

        <div class="texto-entrada">
            <a href="/HistorialParticipativo">
                <h4 class="titulo"><?php echo $historia->titulo; ?></h4>
                <p>Realizada el : <span><?php echo $historia->fecha_inicio; ?></span> por: <span>
                <?php
                        $encontrado = false;
                        foreach ($contacto as $contacto_item) {
                            if ($contacto_item->id == $historia->contacto3_id) {
                                echo $contacto_item->nombre . ' ' . $contacto_item->apellido;
                                $encontrado = true;
                                break;
                            }
                        }
                        if (!$encontrado) {
                            echo 'Sin contacto asignado';
                        }
                        ?>
                </span> </p>

                <p>
                <?php echo substr($historia->descripcion,0,50); ?>
                </p>
            </a>
        </div>
        <?php } ?>
    </article>


