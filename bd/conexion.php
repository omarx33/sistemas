<?php

   
function Conectarse()

{

if(!($link=mysql_connect("localhost","root","")))
{

echo"Error conectando la base de datos";

	exit();
}
  if (!mysql_select_db("ticket",$link)) 
  {

  	echo"Error seleccionando la base de datos";

  	exit();
}

return $link;

}


  ?>
