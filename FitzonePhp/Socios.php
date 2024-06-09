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

      <!-- ======= Head ======= -->
      <?php 
    require_once 'ListaSocios/Head.php';
    ?>
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
      .pagination button {
          margin-right: 10px; /* Ajusta este valor según el espacio deseado */
          margin-left: 10px; /* Ajusta este valor según el espacio deseado */
      }
      .edit-mode .btn-action {
        display: none;
      }
    </style>
  </head>
  <body>

    <!-- ======= Header ======= -->    <?php 
    require_once 'Comun/Header.php';
    ?>    <!-- End Header -->

    <!-- ======= Sidebar ======= --> <?php 
    require_once 'Comun/Sidebar.php';
    ?>    <!-- End Sidebar-->

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
                  <input type="text" class="form-control" id="search" placeholder="Buscar por nombre..">
                  <select class="form-control" id="filter">
                    <option value="">Filtrar por...</option>
                    <option value="Membresia1">Membresia 1</option>
                    <option value="Membresia2">Membresia 2</option>
                    <option value="Membresia3">Membresia 3</option>
                  </select>
                  <select class="form-control" id="sort">
                    <option value="">Ordenar por...</option>
                    <option value="NombreAsc">Nombre Ascendente</option>
                    <option value="NombreDesc">Nombre Descendente</option>
                    <option value="DniAsc">Dni Ascendente</option>
                    <option value="DniDesc">Dni Descendente</option>
                    <option value="IdAsc">Id Ascendente</option>
                    <option value="IdDesc">Id Descendente</option>
                  </select>
                  <button class="btn btn-primary" id="edit-mode">Entrar a modo edición</button>
                </div>
                <!-- Default Table -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nombre y Apellido</th>
                      <th scope="col">Dni</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">Email</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Membresia</th>
                      <th scope="col" id="edit-column" style="display: none;">Edición</th>
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
                          <!-- Botones de paginación -->
                  <div class="pagination d-flex justify-content-center">
                      <button id="prev-page" disabled>&lt;</button>
                      <span id="page-num">  1  </span>
                      <button id="next-page">&gt;</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->    <?php 
    require_once 'Comun/Footer.php';
    ?>    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- JS  -->    <?php 
    require_once 'ListaSocios/JS.php';
    ?>    <!-- End Footer -->

  </body>
</html>