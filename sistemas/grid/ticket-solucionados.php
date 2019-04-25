<script type="text/javascript" language="javascript"
src="listado/seguimiento.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed"
id="seguimiento">
<?php
session_start();
require_once('../bd/conexion.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT t.idticket_cab,cat.categoria,CONCAT(u.nombres,' ',u.apellidos)AS fullname,
t.detalle,t.archivo,a.descripcion as actividades,CONCAT(tec.nombres,' ',tec.apellidos)AS tecnico,
e.descripcion as empresas,t.fecha_creacion,ed.descripcion AS ESTADOS,
DATE_FORMAT(fecha_creacion,'%d-%m-%Y %H:%i:%s') as fecha_creacion	 FROM ticket_cab AS t INNER JOIN actividad AS a  ON
t.actividad_idactividad=a.idactividad INNER JOIN empresa AS e  ON
t.empresa_idempresa=e.idempresa INNER JOIN usuario AS u  ON
t.usuario_idusuario=u.idusuario INNER JOIN estado AS ed  ON
t.estado=ed.idestado  INNER JOIN usuario AS tec  ON
t.usuario_tecnico=tec.idusuario
inner join categoria as cat on cat.idcategoria=t.idcategoria
WHERE t.estado in ('08') and
DATE_FORMAT(fecha_creacion,'%Y-%m-%d') BETWEEN '$_POST[fechainicio]' AND '$_POST[fechafin]'
ORDER BY idticket_cab",$link);
?>
<thead>
<tr>
<th>TICKET</th>
<th>FECHA DE CREACIÓN</th>
<th>USUARIO</th>
<th>TÉCNICO</th>
<th>DETALLE</th>
<th>ACTIVIDAD</th>
<th>EMPRESA</th>
<th>ARCHIVO</th>
<th>FECHA</th>
<th>ESTADO</th>
</tr>
</thead>
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="active">
<td><a href="/sistemas/pages/actualizar-ticket?ticket=<?php echo $reg['idticket_cab']; ?>"><?php echo $reg['idticket_cab']; ?></a></td>
<td><?php echo $reg['fecha_creacion']; ?></td>
<td><?php echo $reg['fullname']; ?></td>
<td><?php echo $reg['tecnico']; ?></td>
<td><?php echo $reg['detalle']; ?></td>
<td><?php echo utf8_encode($reg['actividades']); ?></td>
<td><?php echo $reg['empresas']; ?></td>
<td><a href="<?php echo "http://192.168.1.8/files-ticket/".$reg['archivo']; ?>" target="_blank"><?php echo substr($reg['archivo'],20); ?></a></td>
<td><?php echo $reg['fecha_creacion']; ?></td>
<td><?php echo $reg['categoria']; ?></td>
</tr>

<?php
}
?>
<tbody>
</table>
</div>


<script>
$(document).ready(function() {
$('#seguimiento').DataTable();
} );
</script>
