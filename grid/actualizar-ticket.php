

<div class="table-responsive">
<table class="table table-responsive table-bordered">
<?php
$link=  Conectarse();
$listado= mysql_query("SELECT td.idticket_det,td.detalle,
	horas_hombre,idestado,
	DATE_FORMAT(fecha_creacion,'%d-%m-%Y') AS fecha_creacion,
	DATE_FORMAT(fecha_actualizacion,'%d-%m-%Y') AS fecha_actualizacion,
	DATE_FORMAT(fecha_actualizacion,'%Y-%m-%d') AS fecha,
CONCAT(u.nombres,' ',u.apellidos)AS fullname,e.descripcion AS estados
  FROM  ticket_det as td INNER JOIN usuario as u ON
td.usuario_tecnico=u.idusuario  INNER JOIN estado as e ON
td.estado=e.idestado  WHERE  ticket_cab_idticket_cab=$_GET[ticket]",$link);
?>
<thead>
<tr class="info">
<th>DETALLE</th>

<th>H. HOMBRE</th>
<th>TÉCNICO</th>
<th>ESTADO</th>
<th>F. INICIO</th>
<th>F. UPDATE</th>
<th style="text-align: center"><i class="fa fa-pencil-square-o fa-2x text-primary icenter"></i></th>
<th style="text-align: center"><i class="fa fa-trash fa-2x text-danger icenter"></i></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="success">
<?php

error_reporting(0);

$txta                      ='modal-containera-';
$txtxa                     ='#modal-containera-';
$txta                      .=$j;
$txtxa                     =$txtxa.=$j;

$txt                       ='modal-container-';
$txtx                      ='#modal-container-';
$txt                       .=$i;
$txtx                      =$txtx.=$i;

 ?>
<td><?php echo $reg['detalle'];?></td>

<td><?php echo $reg['horas_hombre'];?></td>
<td><?php echo $reg['fullname'];?></td>
<td><?php echo $reg['estados'];?></td>
<td><?php echo $reg['fecha_creacion'];?></td>
<td><?php echo $reg['fecha_actualizacion'];?></td>
<td style="text-align: center">
<a id="modal-899574" href='<?php echo $txtxa;?>'
role="button" class="btn" data-toggle="modal">
<i class="fa fa-pencil-square-o fa-2x text-primary">	</i></a>
</td>
<td style="text-align: center">
<a id="modal-899574" href='<?php echo $txtx;?>'
role="button" class="btn" data-toggle="modal">
<i class="fa fa-trash fa-2x text-danger"></i></a>
</td>




<!-- INICIO MODAL ACTUALIZAR -->

<form action="/sistemas/procesos/ticket_det.php" method="POST">

<div class="modal fade" id="<?php echo $txta; ?>"
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
ACTUALIZAR  DETALLE
</h4>
</div>
<div class="modal-body">
<input type="hidden" name="ticket" value="<?php echo $_GET['ticket']; ?>">
<input type="hidden" name="idticket_det" value="<?php echo $reg['idticket_det'] ?>">
<input type="hidden" name="tipo" value="actualizar">
<label for="">Detalle:</label>
<div class="form-group">
<textarea name="detalle" id="" class="form-control input-sm" rows="4" placeholder="Ingrese el detalle de tu actividad y luego completa el tiempo que toma realizarla"><?php echo $reg['detalle']; ?></textarea>
</div>

<div class="form-group">
<label>Fecha:</label>
<input type="date"  name="fecha"  class="form-control input-sm"
 value="<?php echo $reg['fecha']; ?>" min="<?php echo $fecha_cabecera; ?>"
  max="<?php echo date('Y-m-d'); ?>" >
</div>


<div class="form-group">
<label for="">Tiempo ocupado:</label>
<input type="number" name="horahombre" id="" class="form-control input-sm" value="<?php echo $reg['horas_hombre']; ?>" step="0.25">
</div>



<div class="form-group">
<label for="">Estado:</label>
<select class="form-control input-sm" name="estado" required>
<option value="<?php echo $reg['idestado']; ?>"><?php echo $reg['estados']; ?></option>
<?php
$link=Conectarse();
$Sql ="SELECT idestado,descripcion FROM estado
WHERE detalle='TICKET' AND idestado not in ('02','03') AND
idestado NOT LIKE '$reg[idestado]'
order by idestado ";

$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value="<?php echo $row['idestado']?>">
<?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>
	<input type="hidden" name="tecnico" value="<?php echo $_SESSION['sis_idusuario']; ?>"	>



</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Actualizar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button>
</div>
</div>

</div>

</div>

</form>
<!-- FIN MODAL ACTUALIZAR-->



<!-- INICIO MODAL ELIMINAR ITEM -->

<form action="/sistemas/procesos/ticket_det.php" method="POST">

<div class="modal fade" id="<?php echo $txt; ?>"
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-danger" id="myModalLabel">
ELIMINAR REGISTRO
</h4>
</div>
<div class="modal-body">
¿Desea eliminar el Registro,perdera toda la información?

<input type="hidden" name="idticket_det" value="<?php echo $reg['idticket_det'] ?>">
<input type="hidden" name="ticket" value="<?php echo $_GET['ticket'] ?>">
<input type="hidden" name="tipo" value="eliminar">

</div>
<div class="modal-footer">

<button type="submit" class="btn btn-danger">
Eliminar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button>
</div>
</div>

</div>

</div>

</form>
<!-- FIN MODAL ELIMINAR ITEM-->



</tr>
<?php
$j=$j+1;
$i=$i+1;
}
?>
</tbody>
</table>
</div>
