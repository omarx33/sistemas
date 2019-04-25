<?php

include'../../../autoload.php';
include'../../../session';


 $fecha =  $_GET['fecha'];

 $anio = date("Y",strtotime($fecha));

$mes = date("m",strtotime($fecha));


$grafico = "";
foreach (Grafico::graficoxarea($mes,$anio) as $key => $value) {
  $grafico .= "['".$value['descripcion']."',".$value['cantidad']."],";
}


 ?>






<?php if (count(Grafico::graficoxarea($mes,$anio))>0): ?>

<div id="container" ></div>


<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>


<script>
Highcharts.chart('container', {
  chart: {
      type: 'pie',
      options3d: {
          enabled: true,
          alpha: 45
      }
  },
  title: {
      text: 'Tickets periodo por área'
  },
  subtitle: {
      text: 'Reporte mes'+' '+<?php echo $mes; ?>+' del ' +<?php echo $anio; ?>
  },
  plotOptions: {
      pie: {
          innerSize: 100,
          depth: 45
      }
  },
  series: [{
      name: 'Cantidad de Tickets',
      data: [
      <?php echo $grafico; ?>
      ]
  }]
});
</script>
