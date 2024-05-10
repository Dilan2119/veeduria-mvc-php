<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="proyecto[titulo]" placeholder="Titulo del proyecto" value="<?php echo s($proyecto->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="proyecto[precio]" placeholder="Precio del proyecto" value="<?php echo s($proyecto->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="proyecto[imagen]">

    <?php if ($proyecto->imagen) { ?>
        <img src="/imagenes/<?php echo $proyecto->imagen ?>" class="imagen-small">

    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="proyecto[descripcion]"><?php echo s($proyecto->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Contacto</legend>
    <label for="contacto">Contacto</label>
    <select name="proyecto[contacto_id]" id="contacto">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($contactos as $contacto){ ?>
            <option 
            <?php echo $proyecto->contacto_id === $contacto->id? 'selected' : '';?>
            value="<?php echo s($contacto->id); ?>"><?php echo s($contacto->nombre) . " " . s
            ($contacto->apellido); ?></option>

        <?php } ?>

    </select>

</fieldset>