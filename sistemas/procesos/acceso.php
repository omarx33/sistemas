<?php 
include('../bd/conexion.php');
include('../clases/Acceso.php');

$acceso = new Acceso();

if ($_REQUEST['tipo']=='login')
 {
	$acceso ->Login($_REQUEST['usuario'],$_REQUEST['contrasena']);
}
else if ($_REQUEST['tipo']=='salir') 
{
	$acceso ->Salir();
}

else
{
	echo "no existe el tipo";
}



 ?>