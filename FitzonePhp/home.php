<?php 
//Para poder visualizar los datos que vienen por el $_SESSION desde la otra seccion, necesito usar la siguiente funcion
session_start();


/* Pregunto, Si tengo vacio el elemento de sesion, me tiene que redireccionar al login.
Lo que hago con esto es eliminar todos los datos de sesion y se encargar de ubicar en el login.
Para que el usuario no pueda acceder a los datos sin haber iniciado sesion.*/
if(empty($_SESSION['Usuario_Nombre'])){
    header('Location: cerrarsesion.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fitzone</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Custom CSS -->
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
    .nav-link {
      color: #fff;
    }
    .nav-link:hover {
      background-color: #e96721;
    }
    .card {
      background-color: #96caff;
      color: #fff;
    }
    .card-title {
      color: #fff;
    }
    .card-icon {
      background-color: #e96721;
      color: #fff;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="inde.php" class="logo d-flex align-items-center">
        <img src="" alt="">
        <span class="d-none d-lg-block">FITZONE</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/<?php echo $_SESSION['Usuario_Img']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['Usuario_Nombre']." ".$_SESSION['Usuario_Apellido']; ?></span>
          </a><!-- End Profile Image Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['Usuario_Nombre']." ".$_SESSION['Usuario_Apellido']; ?></h6>
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
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Socios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="AltaSocio.php" class="active">
              <i class="bi bi-file-earmark-plus"></i><span>Registrar nuevo socio</span>
            </a>
          </li>
          <li>
            <a href="Socios.php" class="active">
              <i class="bi bi-file-earmark-plus"></i><span>Listado de socios</span>
            </a>
        </ul>
      </li><!-- End Socios Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cash-coin"></i><span>Membresias</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="viaje_carga.php" class="active">
              <i class="bi bi-file-earmark-plus"></i><span>Cargar Nueva Membresia</span>
            </a>
          </li>
          <li>
            <a href="viajes_listado.php" class="active">
              <i class="bi bi-layout-text-window-reverse"></i><span>Listado de Membresias</span>
            </a>
          </li>
        </ul>
      </li><!-- End Membresias Nav -->

    </ul>
  </aside><!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Bienvenid@s!!</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="inde.php">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Socios Card -->
            <div class="col-xxl-6 col-xl-6">
              <div class="card info-card">
                <div class="card-body">
                  <h5 class="card-title">Socios</h5>
                  <div class="d-flex flex-column">
                    <div class="card mini-card mb-2">
                      <a href="AltaSocio.php" class="nav-link">
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-plus"></i>
                          </div>
                          <div class="ps-3">
                            <span>Registrar nuevo socio</span>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card mini-card">
                      <a href="Socios.php" class="nav-link">
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-lines-fill"></i>
                          </div>
                          <div class="ps-3">
                            <span>Listado de socios</span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Socios Card -->

            <!-- Membresias Card -->
            <div class="col-xxl-6 col-xl-6">
              <div class="card info-card">
                <div class="card-body">
                  <h5 class="card-title">Membresías</h5>
                  <div class="d-flex flex-column">
                    <div class="card mini-card mb-2">
                      <a href="viaje_carga.php" class="nav-link">
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-journal-plus"></i>
                          </div>
                          <div class="ps-3">
                            <span>Cargar nueva membresía</span>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="card mini-card">
                      <a href="viajes_listado.php" class="nav-link">
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-journal-check"></i>
                          </div>
                          <div class="ps-3">
                            <span>Listado de membresías</span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Membresias Card -->

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>FITZONE</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
