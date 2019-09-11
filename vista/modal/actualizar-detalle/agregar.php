

<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Agregar</h4>

      </div>
      <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">


<div class="row">
<div class="col-md-12">
  <div class="form-group">
    <label>Detalle Técnico:</label>
    <textarea required name="detalle" class="form-control"  rows="3" placeholder="Describe detalles técnicos" required></textarea>
  </div>



</div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label>Detalle para el usuario:</label>
      <textarea class="form-control" name="detalle_user" rows="3" required placeholder="Describe detalle para el envio de correo.
¡Solo enviara correo en los siguientes estados: ANULADO, NO SOLUCIONADO, SOLUCIONADO! "></textarea>
    </div>
  </div>
</div>

<div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label>Fecha:</label>
    <input readonly type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
  </div>

</div>
<div class="col-md-6">
  <div class="form-group">
    <label>Tiempo Ocupado:</label>
    <input type="number"  min="0" step="0.25" name="h_hombre" required class="form-control">
  </div>

</div>

<div class="col-md-6">
  <div class="form-group">
    <label>Estado:</label>
    <select name="estado" class="form-control" name="">

<option value="">[SELECCIONAR EL ESTADO]</option>


<?php
$ticket = new Ticket();

 foreach ($ticket->estado() as $key => $value): ?>
   <option value="<?php echo $value['idestado']?>"><?php echo $value['descripcion']; ?></option>
<?php endforeach; ?>

    </select>

  </div>

</div>

<div class="col-md-6">
    <label>Guardar Historial</label>


<div class="panel-heading">
<label class="radio-inline">
  <input type="radio" class="persona"  name="persona" value="si" />Si
</label>
<label class="radio-inline">
  <input type="radio" class="persona"  name="persona" value="no" checked/>No
</label>
</div>

</div>

</div>

<div id="div1">
<div class="row">
  <div class="col-md-6">
     <div class="form-group">


     </div>
  </div>
  <div class="row">
<div class="col-md-6">

  </div>
  </div>
</div>
</div>



<div id="div2" style="display:none;">
<div class="row">


<div class="col-md-6">
<div class="form-group">
<label>Empresa</label>
<select class="form-control" name="empresa" id="empresa">
  <option value="">[SELECCIONAR]</option>
  <?php
   foreach (Usuario::empresa() as $key => $value): ?>
 <option value="<?php echo $value['idempresa']?>"><?php echo $value['descripcion']?></option>
<?php endforeach ?>

</select>
</div>
</div>


<div class="col-md-6">
  <div class="form-group">
    <div id="pc"></div>
  </div>
</div>

</div>
</div>


<div class="modal-footer">
<input type="hidden"  name="idnumero"  id="id"  value="<?php echo $_GET['ticket']; ?>">

<button type="submit" class="btn btn-primary" name="button">Agregar</button>

</div>


</form>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
$(document).ready(function(){
$(".persona").click(function(evento){

var valor = $(this).val();

if(valor == 'no'){
$("#div1").css("display", "block");
$("#div2").css("display", "none");
}else{
$("#div1").css("display", "none");
$("#div2").css("display", "block");
}
});
});

</script>
