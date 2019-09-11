<?php
class Historial_empresa{

  function lista($mes,$anio,$empresa,$codigo){
  try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     ="SELECT codigo_pc,descripcion,estado,fecha FROM historial where empresa = :empresa and codigo_pc=:codigo and month(fecha) =:mes and year(fecha) =:anio";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':mes',$mes);
    $statement->bindParam(':anio',$anio);
    $statement->bindParam(':empresa',$empresa);
    $statement->bindParam(':codigo',$codigo);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
  } catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
  }


  }


function lista_nav($mes,$anio,$empresa,$codigo){
  try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     ="SELECT p.nombre,h.nro_ticket,concat(u.nombres,' ',u.apellidos) as fullname,codigo_pc,h.descripcion,h.estado,fecha,nombre,h.nro_ticket,e.descripcion as detalle,h.fecha_creacion FROM historial as h
INNER JOIN pcs as p on p.id=h.codigo_pc
INNER JOIN ticket_cab as cab on cab.idticket_cab = h.nro_ticket
INNER JOIN usuario as u on u.idusuario = cab.usuario_idusuario
INNER JOIN estado as e on h.estado=e.idestado  where h.empresa = :empresa and h.codigo_pc=:codigo and month(h.fecha) =:mes and year(h.fecha) =:anio";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':mes',$mes);
    $statement->bindParam(':anio',$anio);
    $statement->bindParam(':empresa',$empresa);
    $statement->bindParam(':codigo',$codigo);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
  } catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
  }

}

  public function empresa(){
  try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     ="SELECT * from empresa";
    $statement = $conexion->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;

  } catch (\Exception $e) {
      echo "ERROR: " . $e->getMessage();
  }


  }

  public function maquina($empresa){
  try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     ="SELECT * from pcs where idempresa=:empresa";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':empresa',$empresa);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;

  } catch (\Exception $e) {
      echo "ERROR: " . $e->getMessage();
  }


  }


}

 ?>
