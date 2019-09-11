<?php
include'../../../autoload.php';
include'../../../session.php';

$id  = $_GET['id'];
 ?>
<form role="form" id="actualizar" autocomplete="off">
<input type="hidden" name="id" value="<?php echo $id; ?>">
 <div class="row">
   <div class="col-md-6">
 <div class="form-group">
   <label>NOMBRES</label>
   <input type="text" name="nombres" class="form-control" maxlength="20" onchange="Mayusculas(this)" value="<?php echo Usuario::consulta($id,'nombres'); ?>">
 </div>
   </div>
     <div class="col-md-6">
 <div class="form-group">
   <label>APELLIDOS</label>
   <input type="text" name="apellidos" class="form-control" maxlength="30" onchange="Mayusculas(this)" value="<?php echo Usuario::consulta($id,'apellidos'); ?>">
 </div>
   </div>
 </div>


 <div class="row">
   <div class="col-md-6">
 <div class="form-group">
   <label>DNI</label>
   <input type="number" name="dni" class="form-control" maxlength="8" step="any" min="0" value="<?php echo Usuario::consulta($id,'dni'); ?>">
 </div>
   </div>
     <div class="col-md-6">
 <div class="form-group">
   <label>CORREO</label>
   <input type="text" name="correo" class="form-control" maxlength="30" value="<?php echo Usuario::consulta($id,'correo'); ?>">
 </div>
   </div>
 </div>


 <div class="row">
   <div class="col-md-6">
       <label>EMPRESA</label>
     <select class="form-control" name="empresa">
       <option value="<?php echo Usuario::consulta($id,'idempresa'); ?>"><?php echo Usuario::consulta($id,'empresa'); ?></option>
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
   <option value="<?php echo Usuario::consulta($id,'idarea'); ?>"><?php echo Usuario::consulta($id,'area'); ?></option>
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
 <textarea name="cargo" rows="3" class="form-control" onchange="Mayusculas(this)" cols="4" placeholder="Describe el cargo"><?php echo Usuario::consulta($id,'cargo'); ?></textarea>

</div>
 </div>
 <div class="col-md-6">
<div class="form-group">
  <label>TIPO </label><br>
  <?php if (Usuario::consulta($id,'tipo')=='1'): ?>
  <label class="radio-inline">
  <input type="radio" name="t_user" value="1" checked>USUARIO
  </label>
  <label class="radio-inline">
  <input type="radio" name="t_user" value="2">ADMINISTRADOR
  </label>
<?php else: ?>
  <label class="radio-inline">
  <input type="radio" name="t_user" value="1" >USUARIO
  </label>
  <label class="radio-inline">
  <input type="radio" name="t_user" value="2" checked>ADMINISTRADOR
  </label>
<?php endif ?>
</div>
 </div>
</div>




 <div class="modal-footer">

 <button type="submit" class="btn btn-primary">Actualizar</button>
 <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
   </div>
</form>

   <script>
       $("#actualizar").submit(function(e){
       e.preventDefault();
       var parametros = $(this).serialize();
        $.ajax({
             type: "POST",
             url: "../controlador/usuarios/actualizar.php",
             data: parametros,
              beforeSend: function(objeto){
               $("#mensaje").html("Mensaje: Cargando...");
               },
             success: function(datos){
             $("#mensaje").html(datos);
            //$("#actualizar")[0].reset();  //resetear inputs
             $('#editModal').modal('hide'); //ocultar modal
             $('body').removeClass('modal-open');
             $("body").removeAttr("style");
             $('.modal-backdrop').remove();
             loadTabla(1);
             }
         });
     });
   </script>
