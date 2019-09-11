<?php
include'../autoload.php';
include'../session.php';


$assets = new Assets();
$html   = new Html();
$message  = new Message();

$assets->principal('Graficos');
$assets->datatables();
$assets ->sweetalert();
$html->header();
 ?>
 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>



 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12">

       <?php include'../vista/nav.php'; ?>

<?php
$grafico = "";
foreach (Grafico::grafico_xempresa(date('Y')) as $key => $value) {
  $grafico .= "{
    name: '".$value['descripcion']." - ".$value['cantidad'].' Tickets'."',
    y: ".$value['cantidad']."
  },";
}
?>







       <div id="container"></div>

<script>
// Build the chart
Highcharts.chart('container', {
chart: {
  plotBackgroundColor: null,
  plotBorderWidth: null,
  plotShadow: false,
  type: 'pie'
},
title: {
  text: 'Reporte de ticket Atendidos el'+' '+ <?php echo date('Y'); ?>
},
tooltip: {
  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
},
plotOptions: {
  pie: {
    allowPointSelect: true,
    cursor: 'pointer',
    dataLabels: {
      enabled: false
    },
    showInLegend: true
  }
},
series: [{
  name: 'Porcentaje',
  colorByPoint: true,
  //----
  data: [

  <?php echo $grafico; ?>

]

  //--
}]
});
</script>


     </div>

     </div>
</div>

 <?php

 $html->footer()
 ;
  ?>
