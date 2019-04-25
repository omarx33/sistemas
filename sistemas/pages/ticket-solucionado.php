<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ticket Solucionado</title>
	<?php include('../header.php') ?>
</head>
<body>
<?php
$ticket = new Ticket();
 ?>


<?php include('../nav.php') ?>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h1 class="text-primary">Confirmar Ticket Solucionado
<i class="fa fa-ticket fa-1x yellow"></i></h1>
<hr>
<form action="../procesos/ticket-solucionado.php" method="POST" onsubmit="return validar(this)">


<div class="form-group">
<label for="">Usuario:</label>
<input type="text" name="usuario" id="" class="form-control" readonly="" value="<?php echo $ticket ->DatosTicket_Cab($_GET['ticket'],'fullname'); ?>">
</div>

<div class="form-group">
<label for="">Empresa:</label>
<input type="text" name="empresa" id="" class="form-control" readonly="" value="<?php echo strtolower($ticket ->DatosTicket_Cab($_GET['ticket'],'empresas')); ?>">
</div>



<div class="form-group">
<label for="">Detalle del Problema del Usuario:</label>
<textarea name="detalle" class="form-control" readonly="" rows="3"><?php echo $ticket ->DatosTicket_Cab($_GET['ticket'],'detalle'); ?></textarea>
</div>


<div class="form-group">
<label for="">Describir la Solución:</label>
<textarea name="solucion" class="form-control"  rows="4" required placeholder="Ingrese el detalle de la solución que empleo para resolver el ticket."></textarea>
</div>


<input type="hidden" name="correousuario" value="<?php echo $ticket ->DatosTicket_Cab($_GET['ticket'],'correo'); ?>">
<input type="hidden" name="correosoporte" value="<?php echo $ticket ->DatosTicket_Cab($_GET['ticket'],'correo_soporte'); ?>">
<input type="hidden" name="ticket" value="<?php echo $_GET['ticket'] ?>">

<div class="form-group">
<input type="submit" name="enviar" class="btn btn-primary btn-lg btn-block" value="Enviar Correo de confirmación" />

</div>

</form>

</div>
</div>
</div>

</body>
</html>
