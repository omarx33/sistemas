<?php

include'../../../autoload.php';
include'../../../session.php';



$ticket   =  new Ticket_asignar();


$folder     =  "ticket_asignar";

 ?>

 <?php if (count($ticket->lista())>0): ?>
 <div class="panel panel-info" >
 	<div class="panel-heading" >
 		<h3 class="panel-title">Lista de Tickets Por Asignar <i class="fa fa-ticket fa-2x yellow"></i></h3>
 	</div>
 	<div class="panel-body">
 	 <div class="table-responsive">
 	 	<table class="table table-hover table-condensed table-bordered" id="consulta">
 	 		<thead>
        <tr class="p-3 mb-2 bg-success text-white">

        <th >TICKET</th>
        <th >FECHA DE CREACIÓN</th>
        <th >USUARIO</th>
        <th >DETALLE</th>
        <th >ACTIVIDAD</th>
        <th >TEAMVIEWER</th>
        <th >EMPRESA</th>
        <th >ARCHIVO</th>
        <th >ESTADO</th>
        </tr>
 	 		</thead>
 	 		<tbody>
 	 		<?php


      foreach ($ticket->lista() as $key => $reg): ?>
        <tr >
          <td><a href="/procesos/envio_correos?tipo=asignar&ticket=<?php echo $reg['idticket_cab']; ?>"><?php echo $reg['idticket_cab']; ?></a></td>
          <td><?php echo $reg['fecha_creacion']; ?></td>
          <td><?php echo $reg['fullname']; ?></td>
          <td><?php echo $reg['detalle']; ?></td>
          <td><?php echo $reg['actividades']; ?></td>
          <td><?php echo 'ID: '.$reg['idteamviewer'].' PASS: '.$reg['passteamviewer'] ?></td>
          <td><?php echo $reg['empresas']; ?></td>
          <td><a href="<?php echo "http://files-ticket.rockdrillgroup.info/".$reg['archivo']; ?>" target="_blank"><?php echo substr($reg['archivo'],20); ?></a></td>
          <td><?php echo $reg['categoria']; ?></td>
        </tr>
 	 		<?php endforeach ?>
 	 		</tbody>
 	 	</table>
 	 </div>
 	</div>
 </div>









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
 <p class="alert alert-warning">No Hay Registros Disponibles.</p>
 <?php endif ?>
