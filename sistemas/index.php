<?php

include'autoload.php';

$session = new Session();



if ($session->existe()=='existe')
{
	include('vista/home.php');
}
else
{

	include('vista/acceso.php');
}

?>
