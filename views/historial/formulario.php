<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="historial[titulo]" placeholder="Titulo de la Reunion" value="<?php echo s($historial->titulo); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="historial[imagen]">

    <?php if ($historial->imagen) { ?>
        <img src="/imagenes/<?php echo $historial->imagen ?>" class="imagen-small">

    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="historial[descripcion]"><?php echo s($historial->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Progreso del Proyecto</legend>
    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" id="fecha_inicio" name="historial[fecha_inicio]" value="<?php echo s($historial->fecha_inicio); ?>">

</fieldset>

<fieldset>
    <legend>Contacto</legend>
    <label for="contacto">Contacto</label>
    <select name="historial[contacto3_id]" id="contacto">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($contactos as $contacto){ ?>
            <option 
            <?php echo $historial->contacto3_id === $contacto->id? 'selected' : '';?>
            value="<?php echo s($contacto->id); ?>"><?php echo s($contacto->nombre) . " " . s
            ($contacto->apellido); ?></option>

        <?php } ?>

    </select>

</fieldset>