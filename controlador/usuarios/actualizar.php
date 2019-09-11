<?php
include'../../autoload.php';
include'../../session.php';

$message = new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['nombres']) AND isset($_POST['apellidos']) AND isset($_POST['dni']) AND isset($_POST['correo']) AND isset($_POST['empresa'])
 AND isset($_POST['area']) AND isset($_POST['cargo']) AND isset($_POST['t_user']))
{
 $id        = $funciones->validar_xss($_POST['id']);
 $nombres   = $funciones->validar_xss($_POST['nombres']);
 $apellidos = $funciones->validar_xss($_POST['apellidos']);
 $dni       = $funciones->validar_xss($_POST['dni']);
 $correo    = $funciones->validar_xss($_POST['correo']);
 $empresa   = $funciones->validar_xss($_POST['empresa']);
 $area      = $funciones->validar_xss($_POST['area']);
 $cargo     = $funciones->validar_xss($_POST['cargo']);
 $t_user    = $funciones->validar_xss($_POST['t_user']);
 if (strlen($id)>0 AND strlen($nombres)>0 AND strlen($apellidos)>0 AND strlen($dni)>0 AND strlen($correo)>0 AND strlen($empresa)>0 AND strlen($area)>0
 AND strlen($cargo) AND strlen($t_user)>0 )
 {

$valor = Usuario::actualiza_user($id,$nombres,$apellidos,$dni,$correo,$empresa,$area,$cargo,$t_user);


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
