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
  <a href="/proyectos/crear" class="boton boton-verde">Nuevo proyecto</a>



  <h2>PROYECTOS EN FORMULACIÓN</h2>
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
      <?php foreach ($proyectos as $proyecto) : ?>
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
      <?php endforeach; ?>
    </tbody>
  </table>


  <h2>PROYECTOS EN EJECUCIÓN</h2>
  <a href="/proyectos_ejecucion/crear" class="boton boton-verde">Iniciar proyecto</a>
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
      <?php foreach ($proyectos_ejecucion as $proyecto) : ?>
        <tr>
          <td><?php echo $proyecto->id; ?></td>
          <td><?php echo $proyecto->nombre; ?></td>
          <td><img src="/imagenes/<?php echo $proyecto->imagen; ?>" alt="error" class="imagen-tabla"></td>
          <td><?php echo number_format($proyecto->inversion, 0, ',', '.'); ?></td>
          <td>
            <form method="POST" class="w-100" action="/proyectos_ejecucion/eliminar">
              <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
              <input type="hidden" name="tipo" value="proyecto">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>

            <a href="/proyectos_ejecucion/actualizar?id=<?php echo $proyecto->id; ?> " class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>