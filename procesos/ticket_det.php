
<?php 
include('../clases/Funciones.php');
include('../clases/Ticket_det.php');
include('../bd/conexion.php');
$funciones = new Funciones();
$ticket_det = new Ticket_det();
$link=Conectarse();

$horashombre=$_POST['horahombre'];//horas hombre


if ($_REQUEST['tipo']=='registrar')
 {
	$ticket_det->Registrar(addslashes($_POST['ticket']),addslashes($_POST['detalle']),addslashes($horashombre),
	addslashes($_POST['tecnico']),addslashes($_POST['estado']),addslashes($_POST['fecha']));
}
else if ($_REQUEST['tipo']=='eliminar') 
{
	$ticket_det->Eliminar($_POST['idticket_det'],$_POST['ticket']);
}

else if ($_REQUEST['tipo']=='actualizar') 
{
	$ticket_det->Actualizar(addslashes($_POST['idticket_det']),addslashes($_POST['ticket']),addslashes($_POST['detalle']),
	addslashes($horashombre),addslashes($_POST['estado']),addslashes($_POST['tecnico']),addslashes($_POST['fecha']));
	
}
else 
{
	echo "no existe el tipo";
}

?>