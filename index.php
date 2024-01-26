<?php
ob_start();
require_once('includes/load.php');
if ($session->isUserLoggedIn(true)) { 
  redirect('home.php', false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventario Boligol</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php echo display_msg($msg); ?>
  <link rel="stylesheet" href="libs/css/login.css">
  <form method="post" action="auth.php" class="clearfix">
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Sistema de Inventario Boligol</h2>
                  <img src="cargas/logo/logo.png" alt="Logo" style="width: 200px; height: 200px;">

                  <div class="form-outline form-white mb-4">
                    <div class="form-group">
                      <label for="username" class="control-label">Nombre de usuario</label>
                      <input type="name" class="form-control" name="username" placeholder="Ingrese su nombre de usuario">
                    </div>
                    <div class="form-outline form-white mb-4">
                      <label for="Password" class="control-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-danger" style="border-radius:0%">Iniciar sesión</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</body>
</html>