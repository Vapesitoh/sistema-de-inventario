<?php
  require_once('includes/load.php');
  page_require_level(2);
?>
<?php
  $product = find_by_id('products',(int)$_GET['id']);
  if(!$product){
    $session->msg("d","Falta la identificación del producto.");
    redirect('product.php');
  }
?>
<?php
  $delete_id = delete_by_id('products',(int)$product['id']);
  if($delete_id){
      $session->msg("s","Productos eliminados.");
      redirect('product.php');
  } else {
      $session->msg("d","La eliminación de productos falló.");
      redirect('product.php');
  }
?>
