<?php
$page_title = 'Inventario Boligol';
require_once('includes/load.php');
page_require_level(3);
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
        <form class="clearfix" method="post" action="sale_report_process.php">
          <div class="form-group">
            
            <div class="input-group">
              <div>

                <label class="form-label">Desde</label>
                <input type="date" class="datepicker form-control" name="start-date">
              </div>
              <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
         <div>

           <label class="form-label">Hasta</label>
           <input type="date" class="datepicker form-control" name="end-date">
         </div>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Generar informe</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
