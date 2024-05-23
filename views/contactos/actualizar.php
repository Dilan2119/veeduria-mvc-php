<main class="contenedor seccion">
    <h1>Actualizar Contacto </h1>
    <a href="/contactos/administrarContacto" class="boton boton-verde">volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" >
       
    <?php include 'formulario.php' ?>

        <input type="submit" value="Guardar cambios" class="boton boton-verde">

    </form>
</main>