<?php
  require_once('includes/load.php');

  page_require_level(1);
?>
<?php
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Id. de categoría faltante.");
    redirect('categorie.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","Categoría eliminada.");
      redirect('categorie.php');
  } else {
      $session->msg("d","No se pudo eliminar la categoría.");
      redirect('categorie.php');
  }
?>
