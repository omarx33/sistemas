<?php

class  Ticket_detalle{




function lista($id){
  try {
    $conexion = new Conexion();
    $modelo   = $conexion->get_conexion();
    $query    = "SELECT td.idticket_det,td.detalle,
	horas_hombre,idestado,
	DATE_FORMAT(fecha_creacion,'%d-%m-%Y') AS fecha_creacion,
	DATE_FORMAT(fecha_actualizacion,'%d-%m-%Y') AS fecha_actualizacion,
	DATE_FORMAT(fecha_actualizacion,'%Y-%m-%d') AS fecha,
CONCAT(u.nombres,' ',u.apellidos)AS fullname,e.descripcion AS estados
  FROM  ticket_det as td INNER JOIN usuario as u ON
td.usuario_tecnico=u.idusuario  INNER JOIN estado as e ON
td.estado=e.idestado  WHERE  ticket_cab_idticket_cab=:id";
    $statement = $modelo->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
  } catch (\Exception $e) {
    echo "error".$e->getMessage();
  }

}


function agregar($estado,$detalle,$fecha,$h_hombre,$idnumero,$tecnico){
  try {

  $conexion = new Conexion();
  $modelo   = $conexion->get_conexion();
  $query    = "INSERT INTO ticket_det(ticket_cab_idticket_cab,detalle,horas_trabajo,horas_hombre,usuario_tecnico,estado,fecha_actualizacion)
                     VALUES(:idnumero,:detalle,'0',:h_hombre,:tecnico,:estado,:fecha)";
    $statement = $modelo->prepare($query);
    $statement->bindParam(':idnumero',$idnumero);
    $statement->bindParam(':h_hombre',$h_hombre);
    $statement->bindParam(':fecha',$fecha);
    $statement->bindParam(':tecnico',$tecnico);
    $statement->bindParam(':detalle',$detalle);
    $statement->bindParam(':estado',$estado);

    if($statement)
        {
        $statement->execute();
        return "ok";
        }
        else
        {
         return "error";
        }


} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
}


}

function agregar_estado($codigo_pc,$nro_ticket,$empresa,$descripcion,$estados,$fecha){
try {
  $conexion = new Conexion();
  $modelo   = $conexion->get_conexion();
  $query    = "INSERT INTO historial(codigo_pc,nro_ticket,empresa,descripcion,estado,fecha) VALUES(:codigo_pc,:nro_ticket,:empresa,:descripcion,:estados,:fecha)";
  $statement = $modelo->prepare($query);
  $statement->bindParam(':nro_ticket',$nro_ticket);
  $statement->bindParam(':codigo_pc',$codigo_pc);
  $statement->bindParam(':empresa',$empresa);
  $statement->bindParam(':descripcion',$descripcion);
  $statement->bindParam(':estados',$estados);
  $statement->bindParam(':fecha',$fecha);
      if($statement)
          {
          $statement->execute();
          return "ok";
          }
          else
          {
           return "error";
          }

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}


}


public function eliminar($id){

try {

  $conexion = new Conexion();
  $modelo   = $conexion->get_conexion();
  $query = "DELETE FROM ticket_det WHERE idticket_det = :id";
  $statement = $modelo->prepare($query);
  $statement->bindParam(':id',$id);
  if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }



} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}


}




public function consulta($id,$campo){
try {
      $conexion = new Conexion();
      $modelo = $conexion->get_conexion();
      $query = "SELECT det.ticket_cab_idticket_cab, e.detalle as detalle_estado , det.detalle ,horas_hombre,e.descripcion,det.estado as estado_id,fecha_actualizacion FROM ticket_det as det inner join
estado as e on det.estado = e.idestado
where idticket_det =:id";
      $statement = $modelo->prepare($query);
      $statement->bindParam(':id',$id);
      $statement->execute();
      $result = $statement->fetch();
      return $result[$campo];

} catch (\Exception $e) {
  echo "ERROR: " . $e->getMessage();
}



}


public function actualizar($detalle,$fecha,$h_hombre,$estado,$idnumero){
try {
$conexion = new Conexion();
$modelo = $conexion->get_conexion();
$query  = "UPDATE ticket_det set detalle =:detalle, fecha_actualizacion =:fecha, horas_hombre=:h_hombre, estado =:estado where idticket_det =:idnumero";
$statement = $modelo->prepare($query);
$statement->bindParam(':detalle',$detalle);
$statement->bindParam(':fecha',$fecha);
$statement->bindParam(':h_hombre',$h_hombre);
$statement->bindParam(':estado',$estado);
$statement->bindParam(':idnumero',$idnumero);
if(!$statement)
  {
  return "error";
  }
  else
  {
  $statement->execute();
  return "ok";
  }


} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}



}

public function actualizar_ticket($actividad,$prioridad,$id){
try {
  $conexion = new Conexion();
  $modelo = $conexion->get_conexion();
  $query  = "UPDATE ticket_cab set prioridad= :prioridad,actividad_idactividad=:actividad where idticket_cab = :id ";
  $statement = $modelo->prepare($query);
  $statement->bindParam(':actividad',$actividad);
  $statement->bindParam(':prioridad',$prioridad);
  $statement->bindParam(':id',$id);
  if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
} catch (\Exception $e) {
      echo "ERROR: " . $e->getMessage();
}


}




public function actualizar_estado($estado,$id){
try {
  $conexion = new Conexion();
  $modelo = $conexion->get_conexion();
  $query  = "UPDATE ticket_cab set estado= :estado where idticket_cab = :id ";
  $statement = $modelo->prepare($query);
  $statement->bindParam(':estado',$estado);
  $statement->bindParam(':id',$id);

  if(!$statement)
    {
    return "error";
  
    }
    else
    {
    $statement->execute();
    return "ok";

    }
} catch (\Exception $e) {
      echo "ERROR: " . $e->getMessage();
}


}


public function consulta_nav($id,$campo){
try {

  $conexion = new Conexion();
  $modelo = $conexion->get_conexion();
  $query = "SELECT t.prioridad,t.idticket_cab,CONCAT(u.nombres,' ',u.apellidos)AS fullname,
t.actividad_idactividad,
t.detalle,t.archivo,a.descripcion as actividades,t.correo,t.usuario_tecnico,e.correo_soporte,
CONCAT(tec.nombres,' ',tec.apellidos)AS tecnico,
e.descripcion as empresas,e.correo_soporte,t.fecha_creacion,t.fecha_asignacion,ed.descripcion AS ESTADOS,DATE_FORMAT(t.fecha_creacion,'%Y-%m-%d') AS fecha_cabecera
 FROM ticket_cab AS t INNER JOIN actividad AS a  ON
t.actividad_idactividad=a.idactividad INNER JOIN empresa AS e  ON
t.empresa_idempresa=e.idempresa INNER JOIN usuario AS u  ON
t.usuario_idusuario=u.idusuario INNER JOIN estado AS ed  ON
t.estado=ed.idestado LEFT JOIN usuario AS tec  ON
t.usuario_tecnico=tec.idusuario
WHERE t.idticket_cab=:id";
  $statement = $modelo->prepare($query);
  $statement->bindParam(':id',$id);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}


}








}


 ?>
