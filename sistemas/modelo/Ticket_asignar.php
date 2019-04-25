<?php


class Ticket_asignar{


  function lista()
  {

  	try {

  	$modelo    = new Conexion();
  	$conexion  = $modelo->get_conexion();
  	$query     = "SELECT t.idticket_cab,CONCAT(u.nombres,' ',u.apellidos)AS fullname,
  t.detalle,t.archivo,a.descripcion as actividades,t.idteamviewer,t.passteamviewer,
  e.descripcion as empresas,DATE_FORMAT(t.fecha_creacion,'%d-%m-%Y %H:%i:%s')as fecha_creacion,c.categoria FROM ticket_cab AS t INNER JOIN actividad AS a  ON
  t.actividad_idactividad=a.idactividad INNER JOIN empresa AS e  ON
  t.empresa_idempresa=e.idempresa INNER JOIN usuario AS u  ON
  t.usuario_idusuario=u.idusuario left join categoria as c on t.idcategoria=c.idcategoria
  WHERE t.estado='02'ORDER BY idticket_cab";
  	$statement = $conexion->prepare($query);

  	$statement->execute();
  	$result = $statement->fetchAll();
  	return $result;
  	} catch (Exception $e) {
  	echo "ERROR: " . $e->getMessage();
  	}


  }



}




 ?>
