<?php


class Ticket{

public function usuario($user,$campo){

  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT *from usuario where idusuario = :user";
  $statement = $conexion->prepare($query);
 $statement->bindParam(':user',$user);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}


public function lista_nav(){
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();


$query     = "SELECT * FROM categoria where idcategoria>=5 AND categoria <> 'ESCALADO'";
  $statement = $conexion->prepare($query);

  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }

}

public function lista_actividad(){
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();


$query     = "SELECT * FROM actividad ";
  $statement = $conexion->prepare($query);

  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }

}




public function estado(){
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
$query     = "SELECT idestado,descripcion FROM estado
WHERE detalle='TICKET' AND idestado not in ('02','03')
order by idestado";
  $statement = $conexion->prepare($query);

  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }

}

public function maquina($id){
try {
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     ="SELECT * from pcs where idempresa = :id ";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':id',$id);

  $statement->execute();
  $result = $statement->fetchAll();
  return $result;

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}


}






function lista_categoria($id,$campo)
{

  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();


$query     = "SELECT idcategoria,categoria FROM categoria where idcategoria = :id ";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':id',$id);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }

}








  function consulta($id,$campo)
  {

    try {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT t.idcategoria as cat_cab,t.idcategoria,t.prioridad,t.idticket_cab,CONCAT(u.nombres,' ',u.apellidos)AS fullname,
t.actividad_idactividad,
t.detalle,t.archivo,a.descripcion as actividades,t.correo,t.usuario_tecnico,e.correo_soporte,
CONCAT(tec.nombres,' ',tec.apellidos)AS tecnico,
e.descripcion as empresas,e.correo_soporte,t.fecha_creacion,t.fecha_asignacion,ed.descripcion AS ESTADOS,DATE_FORMAT(t.fecha_creacion,'%Y-%m-%d') AS fecha_cabecera
 FROM ticket_cab AS t INNER JOIN actividad AS a  ON
t.actividad_idactividad=a.idactividad INNER JOIN empresa AS e  ON
t.empresa_idempresa=e.idempresa INNER JOIN usuario AS u  ON
t.usuario_idusuario=u.idusuario INNER JOIN estado AS ed  ON
t.estado=ed.idestado LEFT JOIN usuario AS tec  ON
t.usuario_tecnico=tec.idusuario WHERE t.idticket_cab=:id";
    $statement = $conexion->prepare($query);
   $statement->bindParam(':id',$id);
    $statement->execute();
    $result = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
    }


  }



  function lista()
  {

  	try {

  	$modelo    = new Conexion();
  	$conexion  = $modelo->get_conexion();
  	$query     = "SELECT c.categoria,t.idticket_cab,CONCAT(u.nombres,' ',u.apellidos)AS fullname,
    t.detalle,t.archivo,a.descripcion as actividades,t.idteamviewer,t.passteamviewer,
    e.descripcion as empresas,
    DATE_FORMAT(t.fecha_creacion,'%d-%m-%Y %H:%i:%s')as fecha_creacion,ed.descripcion AS ESTADOS,c.categoria FROM ticket_cab AS t INNER JOIN actividad AS a  ON
    t.actividad_idactividad=a.idactividad INNER JOIN empresa AS e  ON
    t.empresa_idempresa=e.idempresa INNER JOIN usuario AS u  ON
    t.usuario_idusuario=u.idusuario INNER JOIN estado AS ed  ON
    t.estado=ed.idestado left JOIN categoria as c ON t.idcategoria=c.idcategoria
     WHERE t.estado in ('03','04','05','06','07') AND
    t.usuario_tecnico='".$_SESSION[KEY.ID]."'
    ORDER BY idticket_cab ";
  	$statement = $conexion->prepare($query);

  	$statement->execute();
  	$result = $statement->fetchAll();
  	return $result;
  	} catch (Exception $e) {
  	echo "ERROR: " . $e->getMessage();
  	}


  }





public function asignar($usuario,$ticket)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE ticket_cab set usuario_tecnico=:usuario,estado='03',fecha_asignacion=DATE_ADD(NOW(), INTERVAL -5 HOUR) where idticket_cab=:ticket";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':usuario',$usuario);
    $statement->bindParam(':ticket',$ticket);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }

   }
    catch (Exception $e)
   {
      echo "ERROR: " . $e->getMessage();

   }
}



public function DatosTicket_Cab($id,$campo){

  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT t.prioridad,t.idticket_cab,CONCAT(u.nombres,' ',u.apellidos)AS fullname,
t.actividad_idactividad,
t.detalle,t.archivo,a.descripcion as actividades,t.correo,t.usuario_tecnico,e.correo_soporte,
CONCAT(tec.nombres,' ',tec.apellidos)AS tecnico,
e.descripcion as empresas,e.correo_soporte,t.fecha_creacion,t.fecha_asignacion,ed.descripcion AS ESTADOS,DATE_FORMAT(t.fecha_creacion,'%Y-%m-%d') AS fecha_cabecera
 FROM ticket_cab AS t INNER JOIN actividad AS a  ON
t.actividad_idactividad=a.idactividad INNER JOIN empresa AS e  ON
t.empresa_idempresa=e.idempresa INNER JOIN usuario AS u  ON
t.usuario_idusuario=u.idusuario INNER JOIN estado AS ed  ON
t.estado=ed.idestado LEFT JOIN usuario AS tec  ON
t.usuario_tecnico=tec.idusuario WHERE t.idticket_cab=:id";
  $statement = $conexion->prepare($query);
 $statement->bindParam(':id',$id);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }

}








}




 ?>
