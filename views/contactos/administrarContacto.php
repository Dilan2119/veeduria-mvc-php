<h2>Contactos</h2>

<a href="/contactos/crear" class="boton boton-verde">Nuevo(a) contacto</a>
<a href="/admin" class="boton boton-amarillo">Volver</a>
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

            <a href="/contactos/actualizar?id=<?php echo $contacto->id; ?>
            " class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
 
</main>