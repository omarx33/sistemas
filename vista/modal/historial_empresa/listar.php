<?php

include'../../../autoload.php';
include'../../../session';


 $fecha =  $_GET['fecha'];
 $empresa = $_GET['empresa'];
 $codigo  = $_GET['codigo'];


 $anio = date("Y",strtotime($fecha));
$mes = date("m",strtotime($fecha));
 ?>

<?php if (count(Historial_empresa::lista($mes,$anio,$empresa,$codigo))>0): ?>

  <div class="panel panel-info">
  	<div class="panel-heading">
  		<h3 class="panel-title">HISTORIAL POR EMPRESA</h3>
  	</div>
  	<div class="panel-body">
  	<div class="table-responsive">
  		<table id="consulta" class="table table-condensed table-bordered">
  			<thead>
  				<tr class="info">
  					<th class="text-center">NRO. TICKET</th>
            <th class="text-center">PC</th>
  					<th class="text-center">TÉCNICO</th>
  					<th class="text-center">DESCRIPCIÓN</th>
  					<th class="text-center">ESTADO</th>
            <th class="text-center">FECHA</th>
  				</tr>
  			</thead>
  			<tbody>
  			<?php

  			foreach (Historial_empresa::lista_nav($mes,$anio,$empresa,$codigo) as $key => $value): ?>
  			<tr>
  			<td class="text-center"><?php echo $value['nro_ticket'] ?></td>
        <td class="text-center"><?php echo $value['nombre'] ?></td>
        <td class="text-center"><?php echo $value['fullname'] ?></td>
        <td class="text-center"><?php echo $value['descripcion'] ?></td>
        <td class="text-center"><?php echo $value['detalle'] ?></td>
        <td class="text-center"><?php echo $value['fecha_creacion'] ?></td>

  			</tr>

  			<?php endforeach ?>



             	</tbody>
  		</table>
  	</div>
  	</div>
  </div>

<!--   -->
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>


<script>
  $(document).ready(function(){
    $("#consulta").DataTable(  {
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  });
</script>
