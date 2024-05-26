<main class="contenedor seccion s">
<?php
  if($resultado){
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) {?>
            <p class="alerta exito"><?php echo s($mensaje) ?> </p>
       <?php }
  }

?>
<div class="sidebar ">
    <div class="top">
      <div class="logo">
        <i class="bx bxl-codepen"></i>
        <span>Administrador</span>
      </div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <div class="user">
        <img src="../build/img/banderita.jpg" alt="user" class="user-img">
        <div>
            <p class="bold">PDM</p>
            <p>Admin</p>
        </div>
    </div>
    <ul>
        <li>
            <a href="proyectos/gestionProyectos">
                <i class="bx bxs-grid-alt"></i>
                <span class="nav-item">Gestion de Proyectos</span>
            </a>
            <span class="tooltipp">Gestion de Proyectos</span>
        </li>
        <li>
            <a href="contactos/administrarContacto">
                <i class="bx bx-body"></i>
                <span class="nav-item">Administrar Contacto</span>
            </a>
            <span class="tooltipp">Administrar Contacto</span>
        </li>
        <li>
            <a href="historial/participacionCiudadana">
                <i class="bx bxs-food-menu"></i>
                <span class="nav-item">Participacion Ciudadana</span>
            </a>
            <span class="tooltipp">Participacion Ciudadana</span>
        </li>
        <li>
            <a href="/logout">
                <i class="bx bx-log-out"></i>
                <span class="nav-item">Logout</span>
            </a>
            <span class="tooltipp">Logout</span>
        </li>
    </ul>
  </div>

    <div class="main-content">
        <div class="containerr">
            
        </div>
    </div>
</main>