<?php
include'../autoload.php';
include'../session.php';

$assets = new Assets();
$html   = new Html();
$message  = new Message();
$assets->principal('Ticket asignar');

$assets->datatables();
$assets ->sweetalert();
$html->header();
include'../vista/modal/actualizar-detalle/agregar.php';

include'../vista/modal/actualizar-detalle/eliminar.php';
  $id = $_GET['ticket'];

$ticket = new Ticket();

$idcategoria = $ticket->consulta($id,'idcategoria');

 ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

      <?php include'../vista/nav.php'; ?>

    </div>



  <div class="col-md-4">
    <div class="panel panel-primary">
<div class="panel-heading">
  <h5 class="panel-title">Detalles del ticket # <?php echo $id; ?></h5>
  </div>
  <div class="panel-body">
    <ol>
    <h5>  <li>Usuario: <?php echo $ticket->consulta($id,'fullname'); ?></li></h5>
    <h5> <li>Tecnico: <?php echo $ticket->usuario($_SESSION[KEY.ID],'nombres').' '.$_SESSION[KEY.APELLIDOS]; ?></li></h5>
    <h5>  <li>Correo: <?php echo $ticket->consulta($id,'correo'); ?> </li></h5>
    <h5>  <li>Fecha: <?php echo $ticket->consulta($id,'fecha_asignacion'); ?></li></h5>
    <h5>  <li>Estado: <?php echo $ticket->consulta($id,'ESTADOS'); ?></li></h5>
    </ol>
 <?php $cod = $ticket->consulta($id,'cat_cab');


 ?>


<form class="" action="../controlador/actualizar-ticket/actualizar.php" method="post">


 <div class="form-group">
    <label>Prioridad:</label>


  <select class="form-control" name="prioridad">
    <option value="<?php echo $ticket->consulta($id,'prioridad'); ?>"><?php  if ($ticket->consulta($id,'prioridad') == 1) {
      echo 'Muy Alta';
    }elseif ($ticket->consulta($id,'prioridad') == 2) {
      echo 'Alta';
    }elseif ($ticket->consulta($id,'prioridad') == 3) {
      echo "Media";
    }else {
      echo "Baja";
    } ?></option>
   <option value="1">Muy Alta</option>
   <option value="2">Alta</option>
   <option value="3">Media</option>
   <option value="4">Baja</option>
  </select>

 </div>


 <div class="form-group">
<label>Actividad:</label>
<select class="form-control" name="actividad">


   <option value="<?php echo $ticket->consulta($id,'actividad_idactividad'); ?>"><?php echo $ticket->consulta($id,'actividades');?></option>

<?php foreach ($ticket->lista_actividad() as $key => $value): ?>
   <option value="<?php echo $value['idactividad']?>"><?php echo $value['descripcion']; ?></option>
<?php endforeach; ?>


   </select>
 </div>

<div class="form-group">
  <label>Comentario:</label>
  <textarea name="name" rows="7" class="form-control" cols="50" readonly><?php echo $ticket->consulta($id,'detalle'); ?></textarea>
</div>

<input type="hidden" name="id" value=<?php echo $id; ?>>
<div class="panel-footer">
  <button class="btn btn-primary btn-block btn-lg">Actualizar</button>
</div>
</form>

    </div>

    </div>

    </div>


 <div class="col-md-8">
<button class="btn btn-primary btn-lg btn-block" name="agregar" data-toggle="modal" href="#newModal"><i class="fa fa-plus"></i> Agregar Detalle</button>
<br>
<div class="table-responsive">

  <div id="loader"></div>
  <div id="mensaje"></div>
  <div id="tabla"></div>

</div>
    </div>


<script src="../ajax/app/actualizar-ticket.js"></script>
<script>loadTabla(<?php echo $id ?>);

</script>
</div>


<?php

$html->footer()
;
 ?>
