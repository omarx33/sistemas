<?php

class Grafico
{

function grafico_xempresa($fecha){

  try {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     ="SELECT count(idticket_cab) as cantidad,e.descripcion FROM ticket_cab as cab
inner join empresa as e on cab.empresa_idempresa = e.idempresa

 where year(fecha_asignacion) = :fecha  and cab.estado = '08' group by empresa_idempresa";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':fecha',$fecha);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

}




function graficoxtecnico($mes,$anio){
try {
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT COUNT( idticket_cab ) AS cantidad, usuario_tecnico, CONCAT( u.nombres,  ' ', u.apellidos ) AS fullname
FROM ticket_cab AS cab
INNER JOIN usuario AS u ON cab.usuario_tecnico = u.idusuario
WHERE YEAR( fecha_asignacion ) =  :anio
AND MONTH( fecha_asignacion ) =  :mes
GROUP BY usuario_tecnico
LIMIT 0 , 30";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':mes',$mes);
  $statement->bindParam(':anio',$anio);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $result;
} catch (\Exception $e) {
  echo $e->getMessage();
}


}


function graficoxtecnico2($mes,$anio,$id){
try {
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT count(idticket_cab) as cantidad,estado,usuario_tecnico,e.descripcion from ticket_cab as cab
 inner join estado as e  on e.idestado = cab.estado
 where usuario_tecnico =:id and
 year(fecha_asignacion) = :anio and month(fecha_asignacion) = :mes group by estado;";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':mes',$mes);
  $statement->bindParam(':anio',$anio);
 $statement->bindParam(':id',$id);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $result;
} catch (\Exception $e) {
  echo $e->getMessage();
}


}


function graficoxarea($mes,$anio){
try {
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT count(idticket_cab) as cantidad,a.descripcion from ticket_cab as cab
 inner join usuario as u on cab.usuario_idusuario=u.idusuario
 inner join area as a on u.area_idarea = a.idarea
   where year(fecha_asignacion) = :anio and month(fecha_asignacion) = :mes
 group by a.idarea
";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':mes',$mes);
  $statement->bindParam(':anio',$anio);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $result;
} catch (\Exception $e) {
  echo $e->getMessage();
}


}



function graficoxempresa($mes,$anio){
try {
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT count(idticket_cab) as cantidad,e.descripcion,cab.empresa_idempresa from ticket_cab as cab
 inner join empresa as e on cab.empresa_idempresa=e.idempresa
  where year(fecha_asignacion) = :anio and month(fecha_asignacion) = :mes
 group by empresa_idempresa";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':mes',$mes);
  $statement->bindParam(':anio',$anio);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $result;
} catch (\Exception $e) {
  echo $e->getMessage();
}


}


function graficoxactividad($mes,$anio){
try {
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT count(idticket_cab) as cantidad,actividad_idactividad,a.descripcion from ticket_cab as cab
inner join actividad as a on cab.actividad_idactividad = a.idactividad
 where year(fecha_asignacion) = :anio and month(fecha_asignacion) =:mes
 group by actividad_idactividad;";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':mes',$mes);
  $statement->bindParam(':anio',$anio);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $result;
} catch (\Exception $e) {
  echo $e->getMessage();
}


}


}



 ?>
