<?php
$page_title = 'Inventario Boligol';
$results = '';
  require_once('includes/load.php');

   page_require_level(3);
?>
<?php
  if(isset($_POST['submit'])){
    $req_dates = array('start-date','end-date');
    validate_fields($req_dates);

    if(empty($errors)):
      $start_date   = remove_junk($db->escape($_POST['start-date']));
      $end_date     = remove_junk($db->escape($_POST['end-date']));
      $results      = find_sale_by_dates($start_date,$end_date);
    else:
      $session->msg("d", $errors);
      redirect('sales_report.php', false);
    endif;

  } else {
    $session->msg("d", "Select dates");
    redirect('sales_report.php', false);
  }
?>
<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Inventario Boligol</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
  
</head>
<body>
  <?php if($results): ?>
    <link rel="stylesheet" href="libs/css/report.css">
    <div class="page-break">
       <div class="sale-head">
           <h1>Sistema de Gestión de Inventario - Boligol</h1>
           <strong>DESDE <?php if(isset($start_date)){ echo $start_date;}?> HASTA LA FECHA <?php if(isset($end_date)){echo $end_date;}?> </strong>
       </div>
      <table class="table table-border">
        <thead>
          <tr>
              <th>Fecha</th>
              <th>Titulo del producto</th>
          
              <th>Precio de venta</th>
              <th>Calidad Total</th>
              <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $result): ?>
           <tr>
              <td class=""><?php echo remove_junk($result['date']);?></td>
              <td class="desc">
                <h6><?php echo remove_junk(ucfirst($result['name']));?></h6>
              </td>
              <td class="text-right"><?php echo remove_junk($result['sale_price']);?></td>
              <td class="text-right"><?php echo remove_junk($result['total_sales']);?></td>
              <td class="text-right"><?php echo remove_junk($result['total_saleing_price']);?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
         <tr class="text-right">
           <td colspan="3"></td>
           <td colspan="1">Total Final</td>
           <td> $
           <?php echo number_format(total_price($results)[0], 2);?>
          </td>
         </tr>
         
        </tfoot>
      </table>
    </div>
  <?php
    else:
        $session->msg("d", "Lo sentimos, no se han encontrado ventas.. ");
        redirect('sales_report.php', false);
     endif;
  ?>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
