<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Veeduria Digital</title>
  <link rel="icon" href="/build/img/Escudo de el Zulia.png" type="image/x-icon">
  <link rel="shortcut icon" href="/build/img/Escudo de el Zulia.png" type="image/x-icon">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../build/css/app.css" />
</head>

<body>
  <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <!-- <a href="/">
          <img src="/build/img/logo.svg" alt="logotipo" />
        </a> -->


        <div class="derecha mobile-menu">


          <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark navegacion">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">
                <img src="/build/img/logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
              </a>





              <a class="nav-link"><img class=" dark-mode-boton" src="/build/img/dark-mode.svg"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0 ms-auto">
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/nosotros">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/proyectos">Proyectos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/HistorialParticipativo">Historial Participativo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/informar">Informar</a>
                  </li>



                  <li class="nav-item">
                    <?php if ($auth): ?>
                      <a class="nav-link" href="/logout">Cerrar Sesion</a>
                    <?php endif;?> -->
                  </li>

                </ul>

              </div>
            </div>
          </nav>
        </div>

      </div><!-- cierre de la barra -->


      <?php if ($inicio) {?>
        <h1> Construyendo juntos el desarrollo de El Zulia, un proyecto a la vez.</h1>
      <?php }?>
    </div>
  </header>
  <?php echo $contenido; ?>
  <!-- <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
      <nav class="navegacion">
        <a href="/nosotros">Nosotros</a>
        <a href="/proyectos">Proyectos</a>
        <a href="/HistorialParticipativo">Historial Participativo</a>
        <a href="/informar">Informar</a>
      </nav>
    </div>
    <p class="copyrigth">Todos los derechos reservados  &copy;</p>
  </footer> -->
  <div class="container">
    <footer class="py-3 my-4 footerd ">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/nosotros" class="nav-link px-2 ">Nosotros</a></li>
        <li class="nav-item"><a href="/proyectos" class="nav-link px-2 ">Proyectos</a></li>
        <li class="nav-item"><a href="/HistorialParticipativo" class="nav-link px-2 ">Historial Participativo</a></li>
        <li class="nav-item"><a href="/informar" class="nav-link px-2 ">Informar</a></li>
      </ul>
      <p class="text-center ">&copy; Todos los derechos reservados <?php echo date('Y') ?> </p>
    </footer>
  </div>
  <script src="../build/js/bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>