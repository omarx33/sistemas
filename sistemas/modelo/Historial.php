<?php
class Historial {

function lista($mes,$anio){
try {
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     ="SELECT concat(u.nombres,' ',u.apellidos)as fullname,h.nro_ticket,e.descripcion as nom_empresa,h.descripcion,es.descripcion as des_estado,h.fecha FROM ticket_cab as t_cab
  INNER JOIN historial as h on t_cab.idticket_cab = h.nro_ticket
  INNER JOIN empresa as e on h.empresa = e.idempresa
  INNER JOIN usuario AS u on u.idusuario = t_cab.usuario_idusuario
  INNER JOIN estado as es on h.estado = es.idestado where MONTH(h.fecha)=:mes AND YEAR(h.fecha) =:anio ORDER BY h.nro_ticket";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':mes',$mes);
  $statement->bindParam(':anio',$anio);
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
} catch (\Exception $e) {
  echo "ERROR: " . $e->getMessage();
}


}


}

 ?>
