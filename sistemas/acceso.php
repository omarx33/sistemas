
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Inicio de Sesión</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

<link href="/assets/css/schoolhouse-theme.css" type="text/css" rel="stylesheet">


<!-- CSS code from Bootply.com editor -->


</head>

<!-- HTML code from Bootply.com editor -->

<body  >

<div class="container">
<div class="row">

<div class="panel panel-default">
<div class="panel-heading"> <strong class="">Iniciar Sesión</strong>

</div>
<div class="panel-body">
<form class="form-horizontal" method="POST" action="procesos/acceso">
<input type="hidden" name="tipo" value="login">
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Usuario</label>
<div class="col-sm-9">
<input type="numeric" name="usuario" class="form-control"  placeholder="Usuario" required="" autofocus>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Contrasena</label>
<div class="col-sm-9">
<input type="password" name="contrasena" class="form-control" id="inputPassword3" placeholder="contraseña" required="">
</div>
</div>
<div class="form-group last">
<div class="col-sm-offset-3 col-sm-9">
<button type="submit" class="btn btn-success btn-sm btn-block">Ingresar</button>
</div>
</div>
</form>
</div>

</div>

</div>
</div>

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>


<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>









</body>
</html>
