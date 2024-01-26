<?php
  $page_title = 'Inventario Boligol';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>Bienvenido al inventario de Boligol</h1>
         <p>¡Navega por las diferentes interfaces!</p>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
