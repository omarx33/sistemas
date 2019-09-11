
<?php
include '../../../autoload.php';
include '../../../session';

$ticket_det = new Ticket_detalle();
$id = $_GET['id'];


 ?>

 <?php if (count($ticket_det->lista($id))>0): ?>
 	<div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title">LISTADO</h3>
 	</div>
 	<div class="panel-body">
 		<table id ="consulta" class="table table-bordered table-condensed">


 <thead>
 <tr class="info">
   <th>DETALLE</th>
   <th>H.HOMBRE</th>
   <th>TÉCNICO</th>
   <th>ESTADO</th>
   <th>F.INICIO</th>
   <th>F.ACTUALIZACIÓN</th>
   <th style="text-align: center;">ACCIONES</th>


 </tr>
 </thead>
 <tbody>
 <?php foreach ($ticket_det->lista($id) as $key => $value): ?>
   <tr>
     <td><?php echo $value['detalle']; ?></td>
     <td><?php echo $value['horas_hombre']; ?></td>
     <td><?php echo $value['fullname']; ?></td>
     <td><?php echo $value['estados']; ?></td>
     <td><?php echo $value['fecha_creacion']; ?></td>
     <td><?php echo $value['fecha_actualizacion']; ?></td>
     <td style="text-align: center;">
   		 <a data-id="<?php echo $value['idticket_det'];?>" id=""  class="btn btn-edit btn-sm btn-info" title="Actualizar"><i class="glyphicon glyphicon-edit"></i></a>
   		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['idticket_det']; ?>" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>
   		</td>
   </tr>
 <?php endforeach; ?>
 </tbody>

 </table>

 	</div>
 </div>



<script>

$(".btn-edit").click(function(){
   id = $(this).data("id");
   $.get("../vista/modal/actualizar-detalle/actualizar.php","id="+id,function(data){
     $("#form-edit").html(data);
   });
   $('#editModal').modal('show');
});

</script>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Actualizar</h4>
      </div>
      <div class="modal-body">
      <div id="form-edit"></div>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal  Actualizar-->


 <?php else: ?>
 	<p class="alert alert-warning">lista vacia</p>
 <?php endif ?>
 <script>
   $(document).ready(function(){
     $("#consulta").DataTable(  {
     "language": {
       "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
     }
   });
   });
 </script>
