<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procesos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo PATH ?>pages/ticket">Mis Ticket</a></li>
            <li><a href="<?php echo PATH ?>pages/ticket_asignar">Tickets por Asignar</a></li>
            <li><a href="<?php echo PATH ?>pages/usuarios">Usuarios</a></li>

          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo PATH ?>pages/grafico_tecnicos">Reporte Por Técnico</a> </li>
            <li><a href="<?php echo PATH ?>pages/grafico_area">Reporte Ticket por Área</a> </li>
            <li><a href="<?php echo PATH ?>pages/grafico_actividad">Reporte Ticket por Áctividad</a> </li>
            <li><a href="<?php echo PATH ?>pages/grafico_empresa">Reporte Ticket por Empresa</a> </li>
            <li><a href="<?php echo PATH ?>pages/grafico">Ratio anual de Ticket Atendidos</a></li>
            <li><a href="<?php echo PATH ?>pages/historial">Historial de PCS</a> </li>
            <li><a href="<?php echo PATH ?>pages/historial_empresa">Historial Por Empresa</a> </li>
            <li><a href="http://tickets-pendientes.rockdrillgroup.info/">Cola de Ticket</a></li>

          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

       <li><a href="#"><i class="glyphicon glyphicon-user text-success"></i> <?php echo $_SESSION[KEY.NOMBRES]; ?></a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
          <ul class="dropdown-menu">


           <li><a style="cursor:pointer;"  onclick="logout();">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
