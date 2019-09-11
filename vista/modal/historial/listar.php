<?php

include'../../../autoload.php';
include'../../../session';


 $fecha =  $_GET['fecha'];

 $anio = date("Y",strtotime($fecha));
$mes = date("m",strtotime($fecha));
 ?>

<?php if (count(Historial::lista($mes,$anio))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">HISTORIAL DE PCS</h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table id="consulta" class="table table-condensed table-bordered">
			<thead>
				<tr class="info">
					<th>TICKET</th>
					<th>TÉCNICO</th>
					<th class="text-center">EMPRESA</th>
					<th class="text-center">DESCRIPCIÓN</th>
          <th>ESTADO</th>
          <th>FECHA</th>
				</tr>
			</thead>
			<tbody>
			<?php

			foreach (Historial::lista($mes,$anio) as $key => $value): ?>
			<tr>
			<td><?php echo $value['nro_ticket'] ?></td>
      <td><?php echo $value['fullname'] ?></td>
      <td><?php echo $value['nom_empresa'] ?></td>
      <td><?php echo $value['descripcion'] ?></td>
      <td><?php echo $value['des_estado'] ?></td>
      <td class="text-center"><?php echo $value['fecha'] ?></td>

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
