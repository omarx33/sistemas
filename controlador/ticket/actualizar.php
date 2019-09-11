<?php
include'../../autoload.php';
include'../../session.php';
 $message = new Message();
 $funciones   =  new Funciones();

$id = $_POST['id'];
$tecnico = $_POST['tecnico'];



if (isset($_POST['id']) AND isset($_POST['tecnico']) )
{
	$id          =  $funciones->validar_xss($_POST['id']);
	$tecnico      =  $funciones->validar_xss($_POST['tecnico']);


	if (strlen($id)>0 AND strlen($tecnico)>0 )
	{

  $usuario = new Usuario();
  $valor = $usuario->actualizar($id,$tecnico);

		if($valor=='ok')
		{
		  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		}
		else
		{
		  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
		}
	}
	else
	{
	echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
	}

}
else
{
echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}


 ?>
