<?php
include'../../autoload.php';
include'../../session.php';
$message = new Message();
$funciones   =  new Funciones();

$id = $_POST['id'];

$valor = Usuario::elimina_user($id);

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Eliminado",2);
}
else
{
  echo  $message->mensaje("Error de Eliminación","error","Consulte al área de Soporte",2);
}


 ?>
