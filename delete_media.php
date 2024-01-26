<?php
  require_once('includes/load.php');
 
  page_require_level(2);
?>
<?php
  $find_media = find_by_id('media',(int)$_GET['id']);
  $photo = new Media();
  if($photo->media_destroy($find_media['id'],$find_media['file_name'])){
      $session->msg("s","La foto ha sido eliminada.");
      redirect('media.php');
  } else {
      $session->msg("d","No se pudo eliminar la foto o por falta de permisos.");
      redirect('media.php');
  }
?>
