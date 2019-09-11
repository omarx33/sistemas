<?php
include'../../autoload.php';
include'../../session.php';
$empresa = $_POST['elegido'];

 ?>
<div class="col-md-4">
  <div class="form-group">
    <label>CÓDIGO</label>
    <select class="form-control" name="codigo" id="codigo" required>
      <option value="">[SELECCIONAR]</option>
      <?php foreach (Historial_empresa::maquina($empresa) as $key => $value): ?>
        <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label>FECHA</label>
    <input required type="month" id="fecha"  class="form-control" required
    value="<?php echo date('Y-m') ?>">
  </div>
</div>
