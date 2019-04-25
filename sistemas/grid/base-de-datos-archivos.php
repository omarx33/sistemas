<?php 
$link = Conectarse();
$query   =  " SELECT correo,archivo,substring(archivo,21,2000)as ruta,
fecha_creacion,estado from ticket_cab  
where  substring(archivo,21,2000)!=' '";
 $result  =  mysql_query($query);
 ?>


<div class="table-responsive">
	<table id="consulta" class="table table-hover">
		<thead>
			<tr>
				
				<th>Correo</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Archivo</th>
			</tr>
		</thead>
		<tbody>
			<?php 
            while ($fila = mysql_fetch_object($result)) {
            ?>
             
             <tr>
				
				<td><?php echo $fila->correo; ?></td>
				<td><?php echo $fila->fecha_creacion; ?></td>
				<td><?php echo $fila->estado; ?></td>
				<td><a href="http://192.168.1.8/files-ticket/<?php echo $fila->archivo;?>" target="_blank"><?php echo $fila->ruta; ?></a></td>

			</tr>

            <?php
            }
			 ?>
		</tbody>
	</table>
</div>

<script>
$(document).ready(function() {
$('#consulta').DataTable();
} );
</script>
