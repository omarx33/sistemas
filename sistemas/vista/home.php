<?php

$assets = new Assets();
$html   = new Html();

 $message  = new Message();
$assets ->principal('Bienvenidos');
$assets ->sweetalert();
$assets ->datatables();
$html->header();

echo  (isset($_GET['ok'])) ? $message->mensaje("Bienvenido","success",$_SESSION[KEY.NOMBRES],2) : "" ;

 ?>


<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
    	<?php include'nav.php'; ?>
  </div>


      <div class="col-md-12">





      <div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
      <div id="mensaje"></div><!-- Datos ajax Final -->
      <div id="tabla"></div><!-- Datos ajax Final -->
      </div>



      <script src="../ajax/app/ticket.js"></script>
      <script>loadTabla()</script>


	</div>
</div>







 <?php

$html->footer();
  ?>
