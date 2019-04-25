<?php

class Assets
{


function __construct()
{

}


function principal($titulo)
{

echo '
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>'.$titulo.'</title>
<!-- metas -->
<meta http-equiv="refresh" content="1200">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<!-- Css Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- JS Bootstrap-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Font Awesome-->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="'.PATH.'assets/img/icono.png">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<style>
body
{
font-family:"Varela Round", sans-serif;
}
</style>
<script>

function Mayusculas(field) {
field.value         = field.value.toUpperCase();

}
</script>
';



}

function datatables()
{
echo '<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>';
}


function sweetalert()
{
echo '
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
}



function selectize()
{
echo '<link rel="stylesheet" href="http://selectize.github.io/selectize.js/css/selectize.default.css">
<script src="http://selectize.github.io/selectize.js/js/selectize.js"></script>';
}


function jqueryiu()
{
	echo '<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">';
}


}








 ?>
