<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="proyectos_ejecucion[nombre]" placeholder="Titulo del proyecto" value="<?php echo s($proyectos_ejecucion->nombre); ?>">

    <label for="precio">Inversion:</label>
    <input type="number" id="precio" name="proyectos_ejecucion[inversion]" placeholder="Inversion del proyecto" value="<?php echo s($proyectos_ejecucion->inversion); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="proyectos_ejecucion[imagen]">

    <?php if ($proyectos_ejecucion->imagen) { ?>
        <img src="/imagenes/<?php echo $proyectos_ejecucion->imagen ?>" class="imagen-small">

    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="proyectos_ejecucion[descripcion]"><?php echo s($proyectos_ejecucion->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Progreso del Proyecto</legend>
    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" id="fecha_inicio" name="proyectos_ejecucion[fecha_inicio]" value="<?php echo s($proyectos_ejecucion->fecha_inicio); ?>">

    <label for="progreso">Progreso (%):</label>
    <input type="number" id="progreso" name="proyectos_ejecucion[progreso]" placeholder="Progreso del proyecto" value="<?php echo s($proyectos_ejecucion->progreso); ?>" min="0" max="100">
</fieldset>

<fieldset>
    <legend>Contacto</legend>
    <label for="contacto">Contacto</label>
    <select name="proyectos_ejecucion[contacto2_id]" id="contacto">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($contactos as $contacto){ ?>
            <option 
            <?php echo $proyectos_ejecucion->contacto2_id === $contacto->id? 'selected' : '';?>
            value="<?php echo s($contacto->id); ?>"><?php echo s($contacto->nombre) . " " . s
            ($contacto->apellido); ?></option>

        <?php } ?>

    </select>

</fieldset>