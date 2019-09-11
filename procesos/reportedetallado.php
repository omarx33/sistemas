<?php 

	$dato=$_POST['timpo'];

	$anio=substr($dato,0,4);
	 $mes=substr($dato, 5,2);
 ?>

<br>
 <a href="http://192.168.1.8/sistemas/reporte/detalle-anual.php?anio=<?php echo $anio ?>&mes=<?php echo $mes ?>&tipo=1" class="btn btn-primary" target="blank">Descargar relacion total de tickets <?php echo $mes.'/'.$anio ?></a> 
 <br><br>
  <a href="http://192.168.1.8/sistemas/reporte/detalle-anual.php?anio=<?php echo $anio ?>&mes=<?php echo $mes ?>&tipo=2" class="btn btn-primary" target="blank">Descargar relacion de tickets solucionados <?php echo $mes.'/'.$anio ?></a>
 