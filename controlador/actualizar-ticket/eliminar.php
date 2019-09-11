<?php
include'../../autoload.php';
include'../../session.php';


$message = new Message();


 $id = $_POST['id'];
$ticket_detalle = new Ticket_detalle();
 $valor       = $ticket_detalle->eliminar($id);

 switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Eliminado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>
