<?php

include'../../../autoload.php';
include'../../../session';


 $fecha =  $_GET['fecha'];

 $anio = date("Y",strtotime($fecha));

$mes = date("m",strtotime($fecha));



$grafico = "";
foreach (Grafico::graficoxempresa($mes,$anio) as $key => $value) {
  $grafico .= "['".$value['descripcion']."',".$value['cantidad']."],";
}

 ?>

<?php if (count(Grafico::graficoxempresa($mes,$anio))>0): ?>




<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!--   -->
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>



<script>

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Tickets por empresa: Periodo mes'+' '+<?php echo $mes; ?>+' del ' +<?php echo $anio; ?>



    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [
          <?php echo $grafico; ?>
        ]
    }]
});

</script>
