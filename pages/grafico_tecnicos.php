<?php
include'../autoload.php';
include'../session.php';


$assets = new Assets();
$html   = new Html();
$message  = new Message();

$assets->principal('Usuarios');
$assets->datatables();
$assets ->sweetalert();
$html->header();

include'../vista/modal/grafico_tecnicos/consultar.php';


 ?>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script src="https://code.highcharts.com/modules/data.js"></script>
 <script src="https://code.highcharts.com/modules/drilldown.js"></script>
 <div class="container-fluid">


   <div class="row">
     <div class="col-md-12">

       <?php include'../vista/nav.php'; ?>



     <div class="row">

              <div class="col-md-12">


                <div class="pull-right">

                <button class="btn btn-primary" data-toggle="modal" href="#modal-consultar">Consultar</button>
                </div>


              <div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
              <div id="mensaje"></div><!-- Datos ajax Final -->
              <div id="tabla"></div><!-- Datos ajax Final -->
              </div>
      </div>

      <script src="../ajax/app/grafico_tecnicos.js"></script>
      <script>loadTabla(2019-04)</script>


     </div>
   </div>
     </div>




 <?php
 $html->footer();
  ?>
