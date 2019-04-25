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







 <?php

$html->footer();
  ?>
