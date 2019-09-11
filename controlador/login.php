<?php 

include('../autoload.php');

$funciones  =  new Funciones();

$correo =  $funciones->validar_xss($_POST['correo']);
$pass   =  $funciones->validar_xss($_POST['pass']);

if (empty($correo))
 {
   echo "emptyname";
 }
 else if (empty($pass))
 {
   echo "emptypwd";
 }
 else if (empty($correo) AND empty($pass))
 {
   echo "emptynamepwd";
 }
 else
 {
 	$acceso =  new Acceso($correo,$pass);
    echo $acceso -> Login();
 }





 ?>