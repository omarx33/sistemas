<?php
include'../../../autoload.php';
include'../../../session.php';

$usuario =  new Usuario();

 $id = $_GET['id'];


 ?>
<form id="actualizar">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <h4>Técnicos</h4>
  <select class="form-control" id="idcodigo" name="tecnico">
    <option value="">[--Seleccione --]</option>
    <?php foreach ($usuario->lista_usuario($id) as $key => $value): ?>
      <option value="<?php echo $value['idusuario'] ?>"><?php echo $value['nombres'] ?></option>
    <?php endforeach; ?>

  </select>



  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
    <button  class="btn btn-primary">Escalar</button>
  </div>
</form>

<script>
$("#actualizar").submit(function(e){
e.preventDefault();
var parametros = $(this).serialize();
$.ajax({
type: "POST",
url: "../controlador/ticket/actualizar.php",
data: parametros,
beforeSend: function(objeto){
$("#mensaje").html("Mensaje: Cargando...");
},
success: function(datos){
$("#mensaje").html(datos);
//$("#actualizar")[0].reset();  //resetear inputs
$('#modal-actualizar').modal('hide'); //ocultar modal
$('body').removeClass('modal-open');
$("body").removeAttr("style");
$('.modal-backdrop').remove();
loadTabla();
}
});
});
</script>
