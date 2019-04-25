<?php
include'../../../autoload.php';
include'../../../session.php';

 $id                 =  $_GET['id'];

$ticket_detalle = new Ticket_detalle();


 ?>


<form id="actualizar" autocomplete="off">

  <div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label>Detalle:</label>
      <textarea  name="detalle"  class="form-control"  rows="4" ><?php echo $ticket_detalle->consulta($id,'detalle'); ?>
      </textarea>
    </div>



    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label>Fecha:</label>
        <input type="date" name="fecha" class="form-control" value="<?php echo $ticket_detalle->consulta($id,'fecha_actualizacion'); ?>" max="<?php echo date('Y-m-d'); ?>">
      </div>

    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Tiempo Ocupado:</label>
        <input type="number"  min="0" step="0.25" name="h_hombre" required class="form-control" value="<?php echo round($ticket_detalle->consulta($id,'horas_hombre'),2); ?>">
      </div>

    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label>Estado:</label>
        <select name="estado" class="form-control" >

    <option value="<?php echo $ticket_detalle->consulta($id,'estado_id'); ?>"><?php echo $ticket_detalle->consulta($id,'descripcion'); ?></option>


    <?php
    $ticket = new Ticket();

     foreach ($ticket->estado() as $key => $value): ?>
       <option value="<?php echo $value['idestado']?>"><?php echo $value['descripcion']; ?></option>
    <?php endforeach; ?>

        </select>

      </div>

    </div>



  </div>

  <div class="modal-footer">

    <input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $id; ?>">
    <button type="submit" class="btn btn-primary">Actualizar</button>

  </div>


</form>



<script>
$("#actualizar").submit(function(e){
e.preventDefault();
var parametros = $(this).serialize();
$.ajax({
  type:"POST",
  url:"../controlador/actualizar-ticket/actualizar.php",
  data: parametros,
   beforeSend: function(objeto){
      $("#mensaje").html("Cargando..¡");
   },
  success: function(datos){
       $("#mensaje").html(datos);
       $('#editModal').modal('hide');
       $('body').removeClass('modal-open');
       $("body").removeAttr("style");
       $('.modal-backdrop').remove();
       loadTabla(<?php echo $ticket_detalle->consulta($id,'ticket_cab_idticket_cab'); ?>);
  }
});
});
</script>
