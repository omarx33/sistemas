<?php
include'../autoload.php';
include'../session.php';


$assets = new Assets();
$html   = new Html();
$message  = new Message();

$assets->principal('grafico por Actividad');
$assets->datatables();
$assets ->sweetalert();
$html->header();

include'../vista/modal/grafico_actividad/consultar.php';


 ?>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script src="https://code.highcharts.com/highcharts-3d.js"></script>
 <script src="https://code.highcharts.com/modules/exporting.js"></script>
 <script src="https://code.highcharts.com/modules/export-data.js"></script>
 <div class="container-fluid">


   <div class="row">
     <div class="col-md-12">

       <?php include'../vista/nav.php'; ?>



     <div class="row">

              <div class="col-md-12">


                <div class="pull-right">

                <button class="btn btn-primary" data-toggle="modal" href="#modal-consultar">Consultar</button>
                </div>

                <?php
                 $fecha=strftime( "%Y-%m", time() );
                ?>
              <div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
              <div id="mensaje"></div><!-- Datos ajax Final -->
              <div id="tabla"></div><!-- Datos ajax Final -->
              </div>
      </div>

      <script src="../ajax/app/grafico_actividad.js"></script>
      <script>loadTabla(<?php echo $fecha; ?>)</script>


     </div>
   </div>
     </div>




 <?php
 $html->footer();
  ?>
