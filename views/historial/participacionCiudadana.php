<main class="contenedor seccion">
  <h1>Administrador de Proyectos</h1>
  <?php
  if ($resultado) {
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
      <p class="alerta exito"><?php echo s($mensaje) ?> </p>
  <?php }
  }

  ?>
  <a href="/admin" class="boton boton-amarillo">Volver</a>
  <a href="/historial/crear" class="boton boton-verde">Nueva Mesa</a>



  <h2>Historial De Participacion Ciudadana</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Fecha</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody> <!--. Mostrar los resultados -->
      <?php foreach ($historial as $proyecto) : ?>
        <tr>
          <td><?php echo $proyecto->id; ?></td>
          <td><?php echo $proyecto->titulo; ?></td>
          <td><img src="/imagenes/<?php echo $proyecto->imagen; ?>" alt="error" class="imagen-tabla"></td>
          <td><?php echo $proyecto->fecha_inicio ?></td>
          <td>
            <form method="POST" class="w-100" action="/historial/eliminar">
              <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
              <input type="hidden" name="tipo" value="proyecto">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>

            <a href="/historial/actualizar?id=<?php echo $proyecto->id; ?> " class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


