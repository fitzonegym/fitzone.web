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

  <title>2do Desempeño</title>
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
  <!--<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
--> 
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="inde.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

 
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/<?php echo $_SESSION['Usuario_Img'] ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo  $_SESSION['Usuario_Nombre']." ".$_SESSION['Usuario_Apellido'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo  $_SESSION['Usuario_Nombre']." ".$_SESSION['Usuario_Apellido'] ?></h6>
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
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Configuraciones</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
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
        <a class="nav-link collapsed" href="inde.php">
          <i class="bi bi-grid"></i>
          <span>Panel</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-truck"></i><span>Transporte</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="camion_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo transporte</span>
            </a>
          </li>
          <li>
            <a href="chofer_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo chofer</span>
            </a>
          </li>

       

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-globe2"></i><span>Viajes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="viaje_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo</span>
            </a>
          </li>
          <li>
            <a href="viajes_listado.php" class="active">
            <i class="bi bi-layout-text-window-reverse"></i><span>Listado de viajes</span>
            </a>
          </li>
        </ul>
      </li>

    

    
    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Lista de viajes registrados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inde.php">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Listado</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Viajes cargados</h5>

              <!-- Default Table -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha Viaje</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Camión</th>
                    <th scope="col">Chofer</th>
                    <th scope="col">Costo Viaje</th>
                    <th scope="col">Monto Chofer</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-success" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Viaje realizado">
                    <th scope="row">1</th>
                    <td>02/06/2024</td>
                    <td>Capilla del Monte</td>
                    <td>Iveco - Daily Furgon - AC206JK</td>
                    <td>Alvarez, Marcos</td>
                    <td>$ 300.000</td>
                    <td>$ 30.000 (10%)</td>
                  </tr>

                  <tr class="table-danger" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Viaje de hoy">
                    <th scope="row">2</th>
                    <td>03/06/2024</td>
                    <td>Morteros</td>
                    <td>Scania - Serie P - AA322CX</td>
                    <td>Rodriguez, Ariel</td>
                    <td>$ 100.000</td>
                    <td>$ 15.000 (15%)</td>
                  </tr>

                  <tr  class="table-danger" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Viaje de hoy">
                    <th scope="row">3</th>
                    <td>03/06/2024</td>
                    <td>Toledo</td>
                    <td>Iveco - Daily Chasis - AD698HA</td>
                    <td>Zapata, Joaquin </td>
                    <td>$ 250.000</td>
                    <td>$ 25.000 (10%)</td>
                  </tr>

                  <tr class="table-warning" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Viaje de mañana">
                    <th scope="row">4</th>
                    <td>04/06/2024</td>
                    <td>Capilla del Monte</td>
                    <td>Scania - Serie P - AA322CX</td>
                    <td>Perez, Juan </td>
                    <td>$ 350.000</td>
                    <td>$ 70.000 (20%)</td>
                  </tr>

                  <tr>
                    <th scope="row">5</th>
                    <td>10/06/2024</td>
                    <td>Capilla del Monte</td>
                    <td>Scania - Serie P - AA322CX</td>
                    <td>Perez, Juan </td>
                    <td>$ 350.000</td>
                    <td>$ 70.000 (20%)</td>
                  </tr>


                </tbody>
              </table>
              <!-- End Default Table Example -->

              
            </div>
          </div>
        </div>

 

        
      </div>
    </section>

  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>-->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script> 
  
  <!--<script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>