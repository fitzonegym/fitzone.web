<?php 
// Start the session
session_start();

// Connect to the database
require_once 'funciones/conexion.php';

$miConexion= ConexionBD();

$Mensaje = '';

// If the login button is pressed
if(!empty($_GET['BotonIngreso'])){
    require_once 'funciones/login.php';
    $UsuarioLogueado = DatosLogin($_GET['usser'], $_GET['password'], $miConexion);

    if(!empty($UsuarioLogueado)){
        $_SESSION['Usuario_Nombre'] = $UsuarioLogueado['NOMBRE'];
        $_SESSION['Usuario_Apellido'] = $UsuarioLogueado['APELLIDO'];
        $_SESSION['Usuario_Nivel'] = $UsuarioLogueado['NIVEL'];
        $_SESSION['Usuario_Img'] = $UsuarioLogueado['IMG'];
        header('Location: home.php');
        exit;
    } else {
        $Mensaje = 'Los datos son incorrectos. Intenta nuevamente.';
    }
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body {
      background: url('assets/img/fitzone.backgr.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .card {
      background-color: rgba(0, 0, 0, 0.75);
      color: white;
    }
    .btn-primary {
      background-color: #28a745;
      border: none;
    }
    .btn-primary:hover {
      background-color: #218838;
    }
  </style>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="homr.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Fitzone Gym</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Ingresa tu cuenta</h5>
                    <p class="text-center small">Ingresa tu datos de usuario y clave</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>
                    <?php if(!empty($Mensaje)){ ?>
                        <div class="alert alert-warning alert-dismissable">
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php } ?>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Usuario</label>
                      <div class="input-group has-validation">
                        <input class="form-control" type="text" name="usser" value="" required>
                        <div class="invalid-feedback">Ingresa tu usuario.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Clave</label>
                      <input class="form-control" name="password" type="password" required>
                      <div class="invalid-feedback">Ingresa tu clave</div>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="btn btn-primary w-100" name="BotonIngreso" value="Login">Iniciar Sesión</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0 text-center"><a href="#">¿Olvidó su contraseña?</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

    </div>
  </main>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
