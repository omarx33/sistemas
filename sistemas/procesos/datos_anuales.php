<?php  
	
	include('../bd/conexion.php');
	$link=Conectarse();
	$anio=$_GET['anio'];


	mysql_query("UPDATE reporteanual set atendidos=0,total=1");

	$total=mysql_query("SELECT month(fecha_creacion) mes, count(*) total from ticket_cab where year(fecha_creacion)=".$anio." group by mes  ");

		while($totales=mysql_fetch_array($total)){
			//echo $query="UPDATE fecha_creacion set total=".$totales['total']." where mes=".$totales['mes']."";
			mysql_query("UPDATE reporteanual set total=".$totales['total']." where mes=".$totales['mes']."");
		}



	$atendidos=mysql_query("SELECT month(fecha_creacion) mes, count(*) total from ticket_cab where year(fecha_creacion)=".$anio." and estado='08'  group by mes  ");

		while($atend=mysql_fetch_array($atendidos)){

			mysql_query("UPDATE reporteanual set atendidos=".$atend['total']." where mes=".$atend['mes']."");
		}

		header('Location: http://192.168.1.8/sistemas/reporte/graficos?anio='.$anio);
	?>
 
 
