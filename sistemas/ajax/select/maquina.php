<?php
include'../../autoload.php';
include'../../session.php';
$id = $_POST['elegido'];


 ?>
<input type="hidden" name="" id="maquina3" value="<?php echo $id; ?>">
<label>PC</label>
<select class="form-control" id="maquina" name="maquina">
<option value="">[SELECCIONAR]</option>
<?php foreach (Ticket::maquina($id) as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
<?php endforeach; ?>
</select>

<!--
  <div id="maquina2">
  </div>



<script>
$(document).ready(function() {
// Parametros para el combo

$("#idmaquina").change(function () {
$("#idmaquina option:selected").each(function () {
elegido=$(this).val();
idmaquina = $("#maquina3").val();
$.post("../ajax/select/maquina2.php", { elegido: elegido,elegido2:idmaquina }, function(data){
$("#maquina2").html(data);
});
});
});
});

</script>
-->
