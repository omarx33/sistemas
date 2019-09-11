<?php
//var_dump($_POST);
include'../../autoload.php';
include'../../session.php';

$message = new Message();
$funciones   =  new Funciones();

if (isset($_POST['nombres']) AND isset($_POST['apellidos']) AND isset($_POST['dni']) AND isset($_POST['correo']) AND isset($_POST['empresa'])  AND isset($_POST['area'])  AND isset($_POST['cargo'])){
  $nombres   = $funciones->validar_xss($_POST['nombres']);
  $apellidos = $funciones->validar_xss($_POST['apellidos']);
  $dni       = $funciones->validar_xss($_POST['dni']);
  $correo    = $funciones->validar_xss($_POST['correo']);
  $empresa   = $funciones->validar_xss($_POST['empresa']);
  $area      = $funciones->validar_xss($_POST['area']);
  $cargo     = $funciones->validar_xss($_POST['cargo']);

if (strlen($nombres)>0 AND strlen($apellidos)>0 AND strlen($dni)>0 AND strlen($correo)>0 AND strlen($empresa)>0 AND strlen($area)>0 AND strlen($cargo)>0) {
  $usuario = new Usuario();
  $valor = $usuario->agregar_user($nombres,$apellidos,$dni,$correo,$empresa,$area,$cargo);

  if ($valor=='existe')
  {
    echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
  }
  else if($valor=='ok')
  {
    echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
  }
  else
  {
    echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
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
