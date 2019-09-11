<?php
include'../../autoload.php';
include'../../session.php';
$tipo = $_POST['elegido'];

$id = $_POST['elegido2'];


 ?>
 <div class="row">
   <div class="col-md-6">
     <div class="form-group">
       <label>PC</label>
      <select class="form-control" id="idmaquina" name="maquina">
     <option value="">[SELECCIONAR]</option>
     <?php foreach (Ticket::maquina($id,$tipo) as $key => $value): ?>
       <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
     <?php endforeach; ?>
      </select>
     </div>

   </div>

 </div>
