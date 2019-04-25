
<a id="modal-700675" href="#modal-container-700675" role="button"
 class="btn btn-warning btn-lg btn-block" data-toggle="modal">Agregar Detalle</a>

<form action="/sistemas/procesos/ticket_det.php" method="POST">
<div class="modal fade" id="modal-container-700675" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title" id="myModalLabel">
Agregar Detalle
</h4>
</div>
<div class="modal-body">
<input type="hidden" name="ticket" value="<?php echo $_GET['ticket']; ?>">

<div class="form-group">
<label for="">Detalle:</label>
<textarea name="detalle" id="" class="form-control input-sm" rows="4" placeholder="Ingrese el detalle de tu actividad y luego completa el tiempo que toma realizarla" onchange="conMayusculas(this);" required></textarea>
</div>

<div class="form-group">
<label>Fecha</label>
<input type="date" name="fecha" class="form-control input-sm" required
 value="<?php echo date('Y-m-d'); ?>" min="<?php echo $fecha_cabecera; ?>"
 max="<?php echo date('Y-m-d'); ?>">
</div>


<div class="form-group">
<label for="">Tiempo Ocupado:</label>
<input type="number" name="horahombre" id="" class="form-control input-sm"  required step="0.25">
</div>


<div class="form-group">
<label for="">Estado:</label>
<select class="form-control input-sm"name="estado" required>
<option value="">[SELECIONAR EL ESTADO]</option>
<?php
$link=Conectarse();
$Sql ="SELECT idestado,descripcion FROM estado
WHERE detalle='TICKET' AND idestado not in ('02','03')
order by idestado ";

$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value="<?php echo $row['idestado']?>">
<?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>
<input type="hidden" name="tecnico" value="<?php echo $_SESSION['sis_idusuario']; ?>">


<input type="hidden" name="tipo" value="registrar">

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-warning">
Agregar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button>

</div>
</div>

</div>

</div>
</form>
