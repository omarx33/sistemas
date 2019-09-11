<?php

include'../../../autoload.php';
include'../../../session.php';




$ticket   =  new Ticket();


$folder     =  "ticket";

 ?>

 <?php if (count($ticket->lista())>0): ?>
 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title">Lista de mis Tickets <i class="fa fa-ticket fa-2x yellow"></i></h3>
 	</div>
 	<div class="panel-body">
 	 <div class="table-responsive">
 	 	<table class="table table-hover table-condensed table-bordered" id="consulta">
 	 		<thead>
        <tr class="p-3 mb-2 bg-success text-white">
        <th>TICKET</th>
        <th>FECHA DE CREACIÓN</th>
        <th>USUARIO</th>
        <th>DETALLE</th>
        <th>TEAMVIEWER</th>
        <th>ACTIVIDAD</th>

        <th>EMPRESA</th>
        <th>ARCHIVO</th>
        <th>ESTADO</th>
        <th>NIVEL</th>
          <th>ACCIONES</th>

        </tr>
 	 		</thead>
 	 		<tbody>
 	 		<?php


      foreach ($ticket->lista($valor) as $key => $value): ?>
        <tr >
        <td><a href="../../pages/actualizar-ticket?ticket=<?php echo $value['idticket_cab']; ?>"><?php echo $value['idticket_cab']; ?></a></td>
        <td><?php echo $value['fecha_creacion']; ?></td>
        <td><?php echo $value['fullname']; ?></td>
        <td><?php echo $value['detalle']; ?></td>
        <td><?php echo 'ID: '.$value['idteamviewer'].' PASS: '.$value['passteamviewer'] ?></td>
        <td><?php echo $value['actividades']; ?></td>
        <td><?php echo $value['empresas']; ?></td>
        <td><a href="<?php echo "http://files-ticket.rockdrillgroup.info/".$value['archivo']; ?>" target="_blank"><?php echo substr($reg['archivo'],20); ?></a></td>

        <td><?php echo $value['categoria']; ?></td>
        <td><?php echo $_SESSION[KEY.NIVEL]; ?></td>
        <td class="text-center"> <button class="btn-edit btn btn-primary btn-sm" data-id="<?php echo $value['idticket_cab'] ?>"><i class="glyphicon glyphicon-edit"></i></button></td>

        <form class="navbar-form navbar-left" role="search" method="POST" action="/sistemas/procesos/ticket">
        <input type="hidden" name="ticket" value="<?php echo $value['idticket_cab']; ?>">
        <input type="hidden" name="tipo" value="responsable" requireds>
        <div class="form-group">

          <script>
              $(".btn-edit").click(function(){
                id = $(this).data("id");

                $.get("../vista/modal/<?php echo $folder ?>/actualizar.php","id="+id,function(data){
                  $("#form-edit").html(data);
                });
                $('#modal-actualizar').modal('show');
              });
            </script>

  <div class="modal fade" id="modal-actualizar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Escalar Ticket</h4>
      </div>
      <div class="modal-body">
      <div id="form-edit">

      </div>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



        </tr>
 	 		<?php endforeach ?>
 	 		</tbody>
 	 	</table>
 	 </div>
 	</div>
 </div>









   <script>
 $(document).ready(function(){
    $('#consulta').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
 </script>
 <?php else: ?>
 <p class="alert alert-warning">No Hay Registros Disponibles.</p>
 <?php endif ?>
