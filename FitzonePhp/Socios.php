<?php 
// Start session and check if user is logged in
session_start();

if(empty($_SESSION['Usuario_Nombre'])){
    header('Location: cerrarsesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();
require_once 'funciones/select_socios.php';
$ListadoUsuarios = Listar_Usuarios($MiConexion);
$CantidadUsuarios = count($ListadoUsuarios);
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
    .filter-bar {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .filter-bar .form-control {
      width: 200px;
    }
  </style>
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="" alt="">
        <span class="d-none d-lg-block">FITZONE</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/<?php echo $_SESSION['Usuario_Img'] ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo  $_SESSION['Usuario_Nombre']." ".$_SESSION['Usuario_Apellido'] ?></span>
          </a><!-- End Profile Image Icon -->

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
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
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
            <i class="bi bi-file-earmark-plus"></i><span>Cargar Nueva Membresia</span>
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
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Listado de Socios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Socios</li>
          <li class="breadcrumb-item active">Listado de Socios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Socios Registrados</h5>
              <div class="filter-bar">
                <input type="text" class="form-control" id="search" placeholder="Buscar...">
                <select class="form-control" id="filter">
                  <option value="">Filtrar por...</option>
                  <option value="Nombre">Nombre</option>
                  <option value="Dni">Dni</option>
                  <option value="Email">Email</option>
                </select>
                <select class="form-control" id="sort">
                  <option value="">Ordenar por...</option>
                  <option value="NombreAsc">Nombre Ascendente</option>
                  <option value="NombreDesc">Nombre Descendente</option>
                  <option value="DniAsc">Dni Ascendente</option>
                  <option value="DniDesc">Dni Descendente</option>
                </select>
                <button class="btn btn-primary" id="edit-mode">Modo Edición</button>
              </div>
              <!-- Default Table -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Codigo de Socio</th>
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Membresia</th>
                  </tr>
                </thead>
                <tbody id="socios-table">
                  <?php for ($i=0; $i<$CantidadUsuarios; $i++) { ?>
                    <tr>
                      <td><?php echo $ListadoUsuarios[$i]['ID']; ?></td>
                      <td><?php echo $ListadoUsuarios[$i]['NOMBRE']." ".$ListadoUsuarios[$i]['APELLIDO']; ?></td>
                      <td><?php echo $ListadoUsuarios[$i]['DNI']; ?></td>
                      <td><?php echo $ListadoUsuarios[$i]['DIRECCION']; ?></td>
                      <td><?php echo $ListadoUsuarios[$i]['EMAIL']; ?></td>
                      <td><?php echo $ListadoUsuarios[$i]['TELEFONO']; ?></td>
                    </tr>
                  <?php } ?>
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
      &copy; Copyright <strong><span>FITZONE</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script> 
  <script src="assets/js/main.js"></script>

  <!-- Custom JS for filtering, searching, sorting, and edit mode -->
  <script>
    document.getElementById('search').addEventListener('input', function() {
      let filter = this.value.toUpperCase();
      let rows = document.querySelectorAll('#socios-table tr');
      rows.forEach(row => {
        let name = row.cells[1].textContent.toUpperCase();
        row.style.display = name.includes(filter) ? '' : 'none';
      });
    });

    document.getElementById('filter').addEventListener('change', function() {
      let filterType = this.value;
      let rows = document.querySelectorAll('#socios-table tr');
      rows.forEach(row => {
        if (filterType) {
          let cell = row.cells[filterType === 'Nombre' ? 1 : filterType === 'Dni' ? 2 : 4].textContent.toUpperCase();
          row.style.display = cell.includes(filterType.toUpperCase()) ? '' : 'none';
        } else {
          row.style.display = '';
        }
      });
    });

    document.getElementById('sort').addEventListener('change', function() {
      let sortType = this.value;
      let rows = Array.from(document.querySelectorAll('#socios-table tr'));
      let tbody = document.getElementById('socios-table');
      rows.sort((a, b) => {
        let aText = a.cells[sortType.includes('Nombre') ? 1 : 2].textContent.toUpperCase();
        let bText = b.cells[sortType.includes('Nombre') ? 1 : 2].textContent.toUpperCase();
        if (sortType.includes('Asc')) {
          return aText.localeCompare(bText);
        } else {
          return bText.localeCompare(aText);
        }
      });
      rows.forEach(row => tbody.appendChild(row));
    });

    document.getElementById('edit-mode').addEventListener('click', function() {
      let rows = document.querySelectorAll('#socios-table tr');
      rows.forEach(row => {
        row.contentEditable = row.isContentEditable ? 'false' : 'true';
      });
      this.textContent = this.textContent === 'Modo Edición' ? 'Salir de Edición' : 'Modo Edición';
    });
  </script>

</body>
</html>
