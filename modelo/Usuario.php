<?php


class Usuario{

  function lista_usuario()
  {

    try {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();


  $query     = "SELECT * FROM  usuario WHERE tipo = 02 and idusuario <> '".$_SESSION[KEY.ID]."'";
    $statement = $conexion->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
    } catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
    }

  }


  public function actualizar($id,$tecnico)
  {
     try {
      $modelo    = new Conexion();
      $conexion  = $modelo->get_conexion();
       $query     = "UPDATE ticket_cab  SET usuario_tecnico =:tecnico ,  idcategoria=6 WHERE idticket_cab=:id";
      $statement = $conexion->prepare($query);
      $statement->bindParam(':tecnico',$tecnico);
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

     }
      catch (Exception $e)
     {
        echo "ERROR: " . $e->getMessage();

     }
  }




public function lista(){
try {

$modelo = new Conexion();
$conexion = $modelo->get_conexion();
$query   = "SELECT u.idusuario,u.nombres,u.apellidos,u.dni,u.correo,u.cargo,a.descripcion as area,e.descripcion as empresa from usuario as u inner join area as a on u.area_idarea=a.idarea
inner join empresa as e on u.empresa_idempresa=e.idempresa order by u.idusuario desc";
$statement = $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
return $result;
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}


}



public function area(){
 try {
   $modelo = new Conexion();
   $conexion = $modelo->get_conexion();
   $query = "SELECT * from area";
   $statement = $conexion->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   return $result;
 } catch (\Exception $e) {
     echo "ERROR: " . $e->getMessage();
 }


}



public function empresa(){
 try {
   $modelo = new Conexion();
   $conexion = $modelo->get_conexion();
   $query = "SELECT * from empresa";
   $statement = $conexion->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   return $result;
 } catch (\Exception $e) {
     echo "ERROR: " . $e->getMessage();
 }


}




public function agregar_user($nombres,$apellidos,$dni,$correo,$empresa,$area,$cargo){
try {

  $modelo = new Conexion();
  $conexion = $modelo->get_conexion();
  $query = "SELECT * FROM usuario where dni=:dni";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':dni',$dni);
  $statement->execute();
  $result = $statement->fetchAll();
  if (count($result) >0)
  {
   return "existe";
  }
  else
  {
    $query = "INSERT INTO usuario(nombres,apellidos,dni,cargo,correo,area_idarea,empresa_idempresa)VALUES(:nombres,:apellidos,:dni,:cargo,:correo,:area,:empresa)";
    $statement  = $conexion->prepare($query);
    $statement->bindParam(':nombres',$nombres);
    $statement->bindParam(':apellidos',$apellidos);
    $statement->bindParam(':dni',$dni);
    $statement->bindParam(':correo',$correo);
    $statement->bindParam(':empresa',$empresa);
    $statement->bindParam(':area',$area);
    $statement->bindParam(':cargo',$cargo);
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

} catch (\Exception $e) {
   echo "ERROR: " . $e->getMessage();
}


}


public function elimina_user($id){
try {
  $modelo = new Conexion();
  $conexion = $modelo->get_conexion();
  $query = "DELETE from usuario where idusuario =:id";
  $statement = $conexion->prepare($query);
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




public function actualiza_user($id,$nombres,$apellidos,$dni,$correo,$empresa,$area,$cargo,$t_user){
try {
  $modelo = new Conexion();
  $conexion = $modelo->get_conexion();
  $query = "UPDATE usuario SET nombres=:nombres,apellidos=:apellidos,dni=:dni,correo=:correo,empresa_idempresa=:empresa,area_idarea=:area,cargo=:cargo,tipo=:tipo where idusuario=:id";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':id',$id);
  $statement->bindParam(':nombres',$nombres);
  $statement->bindParam(':apellidos',$apellidos);
  $statement->bindParam(':dni',$dni);
  $statement->bindParam(':correo',$correo);
  $statement->bindParam(':empresa',$empresa);
  $statement->bindParam(':area',$area);
  $statement->bindParam(':cargo',$cargo);
  $statement->bindParam(':tipo',$t_user);
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



public function consulta($id,$campo)
{
try {
  $modelo = new Conexion();
  $conexion = $modelo->get_conexion();
  $query   = "SELECT u.tipo,e.idempresa,a.idarea,u.idusuario,u.nombres,u.apellidos,u.dni,u.correo,u.cargo,a.descripcion as area,e.descripcion as empresa from usuario as u inner join area as a on u.area_idarea=a.idarea
  inner join empresa as e on u.empresa_idempresa=e.idempresa WHERE u.idusuario=:id";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':id',$id);
  $statement->execute();
  $result  = $statement->fetch();
  return $result[$campo];

} catch (\Exception $e) {
   echo "ERROR: " . $e->getMessage();
}


}




}



 ?>
