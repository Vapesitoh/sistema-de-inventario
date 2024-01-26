<?php
$page_title = 'Inventario Boligol';
require_once('includes/load.php');

page_require_level(1);
?>

<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" href="libs/css/backup.css">

<div class="card-container">
    <div class="card">
        <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/2921/2921019.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Respaldo</h5>
            <p class="card-text">Crea el respaldo de la base de datos del sistema.</p>
            <form action="generate_backup.php" method="post">
                <input type="submit" name="submit_backup" value="Crear" class="btn btn-primary btn-crear">
            </form>
        </div>
    </div>

<script src="libs/js/backup.js"></script>

<?php include_once('layouts/footer.php'); ?>
