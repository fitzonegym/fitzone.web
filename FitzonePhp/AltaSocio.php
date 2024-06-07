<?php 
session_start();
if(empty($_SESSION['Usuario_Nombre'])){
  header('Location: cerrarsesion.php');
  exit;
}
require_once 'funciones/conexion.php';
require_once 'funciones/insertarSocios.php';
require_once 'funciones/validacion.php';

$MiConexion= ConexionBD();
$Mensaje='';
$Estilo = 'warning'; 
if (!empty($_GET['BotonRegistrar'])) {
  $Mensaje=Validar_Datos();
  if (empty($Mensaje)) {
      if (InsertarUsuarios($MiConexion) != false) {
          $Mensaje = 'Se ha registrado correctamente.';
          $_POST = array(); 
          $Estilo = 'success'; 
      }
  }
}
if(!empty($_GET['BotonLimpiar']))
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fitzone</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .sidebar {
      background-color: #96caff;
    }
    .sidebar-nav .nav-link {
      color: blue;
    }
    .sidebar-nav .nav-content .nav-item .nav-link {
      padding-left: 30px;
    }
    .main {
      padding: 20px;
      background-color: #f8f9fa;
    }
    .card {
      background-color: #96caff;
    }
    .card-title {
      color: #fff;
    }
    .form-label {
      color: #fff;
    }
    .btn-primary {
      background-color: #F58025;
      border-color: #F58025;
    }
    .btn-secondary {
      background-color: #6C2A5B;
      border-color: #6C2A5B;
    }
    .btn-tertiary {
      background-color: #960e10;
      border-color: #960e10;
    }
    .btn-tertiary:hover {
     background-color: #0f0f0f;
     border-color: #0f0f0f;
    }
  </style>
</head>
<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">FITZONE</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/<?php echo $_SESSION['Usuario_Img']?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['Usuario_Nombre']." ".$_SESSION['Usuario_Apellido'] ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['Usuario_Nombre']." ".$_SESSION['Usuario_Apellido'] ?></h6>
              <span>Administrador</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="cerrarsesion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesion</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Socios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="AltaSocio.php" class="active">
              <i class="bi bi-file-earmark-plus"></i><span>Registrar Nuevo Socio</span>
            </a>
          </li>
          <li>
            <a href="ConsultarSocio.php" class="active">
              <i class="bi bi-file-earmark-plus"></i><span>Consultar Socio</span>
            </a>
          </li>
          <li>
            <a href="ListadoSocios.php" class="active">
              <i class="bi bi-file-earmark-plus"></i><span>Listado de Socios</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cash-coin"></i><span>Membresias</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="viaje_carga.php" class="active">
              <i class="bi bi-file-earmark-plus"></i><span>Registrar Nueva Membresia</span>
            </a>
          </li>
          <li>
            <a href="viajes_listado.php" class="active">
              <i class="bi bi-layout-text-window-reverse"></i><span>Listado de Membresias</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Registrar un Nuevo Socio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Socios</li>
          <li class="breadcrumb-item active">Registrar Nuevo Socio</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ingresa los datos</h5>
              
              <?php if (!empty($Mensaje)) { ?>
                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                  <?php echo $Mensaje; ?>
                </div>
              <?php } ?>
              
              <form class="row g-3" method="GET">
                <div class="col-6">
                  <label for="Nombre" class="form-label">Nombre (*)</label>
                  <input type="text" class="form-control" id="Nombre" name="Nombre" value=" ">
                </div>
                <div class="col-6">
                  <label for="Apellido" class="form-label">Apellido (*)</label>
                  <input type="text" class="form-control" id="Apellido" name="Apellido" value=" ">
                </div>
                <div class="col-6">
                  <label for="Dni" class="form-label">D.N.I (*)</label>
                  <input type="number" class="form-control" id="Dni" name="Dni" value=" ">
                </div>
                <div class="col-6">
                  <label for="Email" class="form-label">Email (*)</label>
                  <input type="email" class="form-control" id="Email" name="Email" value=" ">
                </div>
                <div class="col-6">
                  <label for="Telefono" class="form-label">Telefono (*)</label>
                  <input type="number" class="form-control" id="Telefono" name="Telefono" value=" ">
                </div>
                <div class="col-6">
                  <label for="Direccion" class="form-label">Direccion</label>
                  <input type="text" class="form-control" id="Direccion" name="Direccion" value=" ">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="BotonRegistrar" value="Registrar">Registrar</button>
                  <button type="submit" class="btn btn-secondary" name="BotonLimpiar" value="Limpiar">Limpiar</button>
                  <button type="submit" class="btn btn-tertiary text-white" name="BotonCancelar" formaction="home.php">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Fitzone</span></strong>. All Rights Reserved
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  

</body>
</html>
