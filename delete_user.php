<?php
require_once('includes/load.php');
page_require_level(1);

$current_user_id = (int)$_GET['id'];
$logged_user_id = (int)$_SESSION['user_id'];

if ($current_user_id === $logged_user_id) {
    $session->msg("d", "No tienes permiso para eliminarte a ti mismo.");
    redirect('users.php');
}

$delete_id = delete_by_id('users', $current_user_id);
if ($delete_id) {
    $session->msg("s", "Usuario eliminado.");
    redirect('users.php');
} else {
    $session->msg("d", "No se pudo eliminar el usuario o faltan permisos para hacerlo.");
    redirect('users.php');
}
?>
