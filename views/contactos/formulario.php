
<fieldset>
    <legend>Informacion General</legend>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="contacto[nombre]" placeholder="Nombre del Contacto" 
    value="<?php echo s($contacto->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="contacto[apellido]" placeholder="Apellido del Contacto" 
    value="<?php echo s($contacto->apellido); ?>">

</fieldset>

<fieldset>
    <legend>Informacion Extra</legend>
    <label for="telefono">Telefono:</label>
    <input type="text" id="telefono" name="contacto[telefono]" placeholder="Telefono del Contacto" 
    value="<?php echo s($contacto->telefono); ?>">


</fieldset>