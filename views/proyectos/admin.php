<main class="contenedor seccion">
  <h1>Administrador de Proyectos</h1>
  <?php
  if($resultado){
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) {?>
            <p class="alerta exito"><?php echo s($mensaje) ?> </p>
       <?php }
  }

?>

  <a href="/proyectos/crear" class="boton boton-verde">Nuevo proyecto</a>
  <a href="/contactos/crear" class="boton boton-amarillo">Nuevo(a) contacto</a>
  
    <h2>Proyectos</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Inversion</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody> <!--. Mostrar los resultados -->
    <?php foreach ($proyectos as $proyecto): ?>
        <tr>
          <td><?php echo $proyecto->id; ?></td>
          <td><?php echo $proyecto->titulo; ?></td>
          <td><img src="/imagenes/<?php echo $proyecto->imagen; ?>" alt="error" class="imagen-tabla"></td>
          <td><?php echo number_format($proyecto->precio, 0, ',', '.'); ?></td>
          <td>
            <form method="POST" class="w-100" action="/proyectos/eliminar">
              <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
              <input type="hidden" name="tipo" value="proyecto">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>

            <a href="/proyectos/actualizar?id=<?php echo $proyecto->id; ?> " class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>

  <h2>Contactos</h2>

  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody> <!--. Mostrar los resultados -->
    <?php foreach ($contactos as $contacto): ?>
        <tr>
          <td><?php echo $contacto->id; ?></td>
          <td><?php echo $contacto->nombre . " " . $contacto->apellido; ?></td>
          <td><?php echo $contacto->telefono; ?></td>
          <td>
            <form method="POST" class="w-100" action="/contactos/eliminar">
              <input type="hidden" name="id" value="<?php echo $contacto->id; ?>">
              <input type="hidden" name="tipo" value="contacto">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>

            <a href="contactos/actualizar?id=<?php echo $contacto->id; ?>
            " class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
 
</main>