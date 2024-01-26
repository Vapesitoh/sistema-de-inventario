<?php
require_once('includes/load.php');
page_require_level(1);

$current_group_id = (int)$_GET['id'];

// Obtener los detalles del grupo que se intenta eliminar
$group = find_by_id('user_groups', $current_group_id);

// Verificar si el grupo es el "Administrador" (con group_level = 1)
if ($group['group_level'] === '1') {
    $session->msg("d", "No se puede eliminar la categoría Administrador.");
    redirect('group.php');
}

$delete_id = delete_by_id('user_groups', $current_group_id);
if ($delete_id) {
    $session->msg("s", "El grupo ha sido eliminado.");
    redirect('group.php');
} else {
    $session->msg("d", "No se pudo eliminar el grupo o faltan permisos.");
    redirect('group.php');
}
?>
