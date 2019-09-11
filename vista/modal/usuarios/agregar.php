<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" id="agregar">


<div class="row">
  <div class="col-md-6">
<div class="form-group">
  <label>NOMBRES</label>
  <input type="text" name="nombres" class="form-control" maxlength="20" onchange="Mayusculas(this)">
</div>
  </div>
    <div class="col-md-6">
<div class="form-group">
  <label>APELLIDOS</label>
  <input type="text" name="apellidos" class="form-control" maxlength="30" onchange="Mayusculas(this)">
</div>
  </div>
</div>


<div class="row">
  <div class="col-md-6">
<div class="form-group">
  <label>DNI</label>
  <input type="number" name="dni" class="form-control" maxlength="8" step="any" min="0">
</div>
  </div>
    <div class="col-md-6">
<div class="form-group">
  <label>CORREO</label>
  <input type="text" name="correo" class="form-control" maxlength="30">
</div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
      <label>EMPRESA</label>
    <select class="form-control" name="empresa">
      <option value="">[SELECCIONAR]</option>
      <?php
       foreach (Usuario::empresa() as $key => $value): ?>
     <option value="<?php echo $value['idempresa']?>"><?php echo $value['descripcion']?></option>
    <?php endforeach ?>

    </select>
  </div>

  <div class="col-md-6">
<div class="form-group">
  <label>AREA</label>
<select class="form-control" name="area">
  <option value="">[SELECCIONAR]</option>
  <?php

   foreach (Usuario::area() as $key => $value): ?>
 <option value="<?php echo $value['idarea']?>"><?php echo $value['descripcion']?></option>
<?php endforeach ?>

</select>
</div>
  </div>

</div>

<div class="row">


  <div class="col-md-6">
<div class="form-group">
  <label>CARGO</label>
  <textarea name="cargo" rows="3" class="form-control" onchange="Mayusculas(this)" cols="4" placeholder="Describe el cargo"></textarea>

</div>
  </div>
</div>

<br>
  <div class="modal-footer">
  <button type="submit" class="btn btn-primary">Agregar</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
    </div>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
