<?php

class Acceso
{


protected $user;
protected $pass;


function __construct($user='',$pass='')
{
	$this->user = $user;
	$this->pass = $pass;
}


public function login()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM usuario WHERE usuario=:user AND contrasena=:pass AND tipo= '2' and estado = '01'";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':user',$this->user);
    $statement->bindParam(':pass',$this->pass);
    $statement->execute();
    $result   = $statement->fetchall();

    if (count($result) >0)
    {

     session_start();
     $statement->execute();
     $dato   = $statement->fetch();
     $_SESSION[KEY.ID]        = $dato['idusuario'];
     $_SESSION[KEY.NOMBRES]   = $dato['nombres'];
     $_SESSION[KEY.APELLIDOS] = $dato['apellidos'];
		 $_SESSION[KEY.NIVEL] = $dato['nivel'];


     return "true";
    }
    else
    {
      return "false";
    }

   }
    catch (Exception $e)
   {
      return  "ERROR: " . $e->getMessage();

   }
}




function  logout()
{

  try {

  if (!isset($_SESSION[KEY.ID]))
  {
     header('Location: '.PATH.'');
  }
  else
  {

     unset($_SESSION[KEY.ID]);
     unset($_SESSION[KEY.NOMBRES]);
     unset($_SESSION[KEY.APELLIDOS]);


     header('Location: '.PATH.'');
  }

  } catch (Exception $e) {

    echo   "ERROR: " . $e->getMessage();

  }

}




}




 ?>
