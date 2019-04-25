<?php
include'../../autoload.php';
include'../../session.php';

//echo var_dump($_POST);
$message = new Message();
$funciones = new Funciones();

$actividad = $_POST['actividad'];
$prioridad = $_POST['prioridad'];
$id        = $_POST['id'];

$valor  = Ticket_detalle::actualizar_ticket($actividad,$prioridad,$id);
if ( $valor=='ok') {
header("Location: http://sistemas.rockdrillgroup.info/pages/actualizar-ticket?ticket=$id");
}



if (isset($_POST['detalle']) AND isset($_POST['fecha']) AND isset($_POST['h_hombre']) AND isset($_POST['estado']) AND isset($_POST['idnumero']))
 {
  $detalle   =  $funciones->validar_xss($_POST['detalle']);

  $fecha     =  $funciones->validar_xss($_POST['fecha']);

  $h_hombre  =  $funciones->validar_xss($_POST['h_hombre']);

  $estado    =  $funciones->validar_xss($_POST['estado']);

  $idnumero  =  $funciones->validar_xss($_POST['idnumero']);

  if (strlen($detalle)>0 AND strlen($fecha)>0 AND strlen($h_hombre)>0 AND strlen($estado) >0 AND strlen($idnumero)>0) {
  $objeto  = new Ticket_detalle();
  $valor = $objeto->actualizar($detalle,$fecha,$h_hombre,$estado,$idnumero);

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

}else{
echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
};


 ?>
