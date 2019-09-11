

<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Inicio de Sesión</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Css Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- JS Bootstrap-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

<link href="/assets/css/schoolhouse-theme.css" type="text/css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


<!-- Jquery -->
<!-- CSS code from Bootply.com editor -->
<script src="ajax/login.js"></script>
<style type="text/css">
/* CSS used here will be applied after bootstrap.css */

body {
background: url('/assets/img/tic.png') no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}



.panel-default {
opacity: 0.9;
margin-top:120px;
}
.form-group.last {
margin-bottom:0px;
}
</style>
</head>

<!-- HTML code from Bootply.com editor -->

<body  >


<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">
<div class="panel-heading"> <strong class="">Iniciar Sesión</strong>

</div>
<div class="panel-body">
 <div  id="mensaje"></div>
<form class="form-horizontal" method="POST" >

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Usuario</label>
<div class="col-sm-9">
<input type="numeric" name="correo" id="correo" class="form-control"  placeholder="Usuario" autofocus>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Contrasena</label>
<div class="col-sm-9">
<input type="password" name="contrasena" id="pass" class="form-control" id="inputPassword3" placeholder="contraseña" >
 <input type="hidden" id="path" value="<?php echo PATH; ?>">
</div>
</div>
<div class="form-group last">
<div class="col-sm-offset-3 col-sm-9">

<input type="submit" id="login" class="btn btn-success btn-sm btn-block"  value="Enviar">
</div>
</div>
</form>
</div>

</div>
</div>
</div>
</div>

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>


<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</body>
</html>
