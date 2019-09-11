<?php
#error_reporting(0);
date_default_timezone_set('America/Lima');

#define("PATH", "http://".$_SERVER['SERVER_NAME'].substr(dirname(__FILE__).DIRECTORY_SEPARATOR,strlen($_SERVER['DOCUMENT_ROOT'])));
define("PATH","http://sistemas.rockdrillgroup.info/");
define("FOLDER","/sistemas/");


define("SERVER","localhost");
define("USER", "root");
define("PASS", "perutec");
define("BD", "ticket");


$key  = date('Y-m-d').$_SERVER['SERVER_NAME'].FOLDER;
define("KEY",$key);

#CONSTANTES
define("ID", "ID");
define("NOMBRES", "NOMBRES");
define("APELLIDOS", "APELLIDOS");






 ?>
