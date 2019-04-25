<?php
include'../../../autoload.php';
include'../../../session.php';

$objeto = new Usuario();
 ?>

 <?php if ( count($objeto->lista()) > 0): ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lista de Usuarios</h3>
  </div>
<div class="panel-body">
  <div class="table-responsive">
    <table id="consulta" class="table table-bordered table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>NOMBRES</th>
          <th>APELLIDOS</th>
          <th>DNI</th>
          <th>CARGO</th>
          <th>CORREO</th>
          <th>AREA</th>
          <th>EMPRESA</th>
          <th>ACCIONES</th>

        </tr>
      </thead>
      <tbody>
        	<?php
           $contador = 1;
          foreach ($objeto->lista() as $key => $value): ?>
          <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $value['nombres']; ?></td>
            <td><?php echo $value['apellidos']; ?></td>
            <td><?php echo $value['dni']; ?></td>
            <td><?php echo $value['cargo']; ?></td>
            <td><?php echo $value['correo']; ?></td>
            <td><?php echo $value['area']; ?></td>
            <td><?php echo $value['empresa']; ?></td>
            <td style="text-align: center;">
              <a data-id="<?php echo $value['idusuario'];?>" id=""  class="btn btn-edit btn-sm btn-info" title="Actualizar"><i class="glyphicon glyphicon-edit"></i></a>
             		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['idusuario']; ?>" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>

            </td>
          </tr>
            	<?php endforeach ?>
      </tbody>

    </table>
  </div>
</div>

</div>



<script>
$(".btn-edit").click(function(){
    id = $(this).data("id");
    $.get("../vista/modal/usuarios/actualizar.php","id="+id,function(data){
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









<script>
	$(document).ready(function(){
	$('#consulta').DataTable(

    {
  "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
  }
}
  );
	});
</script>

<?php else: ?>
 <div class="panel panel-default">
 <div class="panel-heading">
   <h3 class="panel-title"><?php echo $titulo; ?></h3>
 </div>
 <div class="panel-body">
   <p class="alert alert-warning">No existen Registros.</p>
 </div>
</div>
<?php endif ?>
