<?php

include'../../../autoload.php';
include'../../../session';


  $fecha =  $_GET['fecha'];

 $anio = date("Y",strtotime($fecha));

$mes = date("m",strtotime($fecha));

$grafico = "";
$grafico_jose = "";
$grafico_omar = "";
$grafico_josue = "";
$grafico_willian = "";
$grafico_marco = "";
$grafico_jorge = "";
$grafico_jesus = "";
$grafico_proveedor = "";
$grafico_administrador = "";
foreach (Grafico::graficoxtecnico($mes,$anio) as $key => $value) {
  $grafico .= "{
    name: '".$value['fullname'] ." - ".$value['cantidad'].' Tickets'."',
    y: ".$value['cantidad'].",
   drilldown:  '".$value['usuario_tecnico']."',


  },";




foreach (Grafico::graficoxtecnico2($mes,$anio,$value['usuario_tecnico']) as $key_2 => $value_2) {


  //$value_2['estado'].' ';
if ($value['usuario_tecnico']==212) {

$grafico_jose .="[
    '".$value_2['descripcion']."',
    ".$value_2['cantidad']."

  ],";
}elseif ($value['usuario_tecnico']==252) {

$grafico_omar .="[
    '".$value_2['descripcion']."',
    ".$value_2['cantidad']."

  ],";
}elseif ($value['usuario_tecnico']==19) {
  $grafico_marco .="[
      '".$value_2['descripcion']."',
      ".$value_2['cantidad']."

    ],";
}elseif ($value['usuario_tecnico']==36) {
  $grafico_josue .="[
      '".$value_2['descripcion']."',
      ".$value_2['cantidad']."

    ],";
}elseif ($value['usuario_tecnico']==77) {
  $grafico_willian .="[
      '".$value_2['descripcion']."',
      ".$value_2['cantidad']."

    ],";
}elseif ($value['usuario_tecnico']==176) {
  $grafico_jorge .="[
      '".$value_2['descripcion']."',
      ".$value_2['cantidad']."

    ],";
}elseif ($value['usuario_tecnico']==177) {
  $grafico_jesus .="[
      '".$value_2['descripcion']."',
      ".$value_2['cantidad']."

    ],";
}elseif ($value['usuario_tecnico']==257) {
  $grafico_proveedor .="[
      '".$value_2['descripcion']."',
      ".$value_2['cantidad']."

    ],";
}elseif ($value['usuario_tecnico']==37) {
  $grafico_administrador .="[
      '".$value_2['descripcion']."',
      ".$value_2['cantidad']."

    ],";
}

//-------


  //---
}



}

//var_dump($grafico_omar);
?>


<?php if (count(Grafico::graficoxtecnico($mes,$anio))>0): ?>




<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!--   -->
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>



<script>
// Create the chart
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
     text: 'Tickes Atendidos del mes: '+<?php echo $mes; ?>+' año '+<?php echo $anio; ?>
  },
  subtitle: {
   text: 'Grafico por técnicos'
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total Cantidad de Tickets Atendidos'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "TÉCNICO",
      colorByPoint: true,
      data: [
        //----


<?php echo $grafico; ?>
      //----
      ]
    }
  ],
  drilldown: {
    series: [
      {
        name: "Jose Adrian",
        id: "212",
        data: [

    <?php echo $grafico_jose; ?>
        ]
      },
      {
        name: "Omar Mori",
        id: "252",
        data: [
        <?php echo $grafico_omar; ?>

        ]
      },
      {
        name: "Marco Garcia",
        id: "19",
        data: [

              <?php echo $grafico_marco; ?>
        ]
      },
      {
        name: "Jesus Roncal",
        id: "177",
        data: [

          <?php echo $grafico_jesus; ?>
        ]
      },
      {
        name: "Jorge Turpo",
        id: "176",
        data: [
        <?php echo $grafico_jorge; ?>
        ]
      },
      {
        name: "Josue Nuñes",
        id: "36",
        data: [
      <?php echo $grafico_josue; ?>
        ]
      },
      {
        name: "Proveedor",
        id: "257",
        data: [
      <?php echo $grafico_proveedor; ?>
        ]
      },
      {
        name: "Willian Lopez",
        id: "77",
        data: [
      <?php echo $grafico_willian; ?>
        ]
      },
      {
        name: "Administrador",
        id: "37",
        data: [
      <?php echo $grafico_administrador; ?>
        ]
      }

    ]
  }
});

</script>
