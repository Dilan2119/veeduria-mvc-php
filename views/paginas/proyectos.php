<main class="contenedor seccion ">
  <div class="titulo2">
    <input type="text" name="buscador" id="buscador" placeholder="Buscar Proyecto...">

    <div id="mensaje-busqueda" style="display: none;">No se encontraron proyectos que coincidan con tu búsqueda.</div>

    <!-- Tus proyectos aquí -->
    <h2 class="titulo titulo-seccion ">Proyectos en Formulación</h2>

    <?php
include 'listado.php';
?>
    <h2 class="titulo titulo-seccion">Proyectos En Ejecución</h2>

    <?php
include 'listado2.php';
?>
  </div>


</main>