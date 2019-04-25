<?php
include'../autoload.php';
include'../session.php';


$assets = new Assets();
$html   = new Html();
$message  = new Message();

$assets->principal('Historial');
$assets->datatables();
$assets ->sweetalert();
$html->header();

include'../vista/modal/historial_empresa/consultar.php';


 ?>



 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12">

       <?php include'../vista/nav.php'; ?>

     </div>



<div class="row">

         <div class="col-md-12">


           <div class="pull-right">

           <button class="btn btn-primary" data-toggle="modal" href="#modal-consultar">Consultar</button>
           </div>


         <div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
         <div id="mensaje"></div><!-- Datos ajax Final -->
         <div id="tabla"></div><!-- Datos ajax Final -->
         </div>
 </div>
         <script src="../ajax/app/historial_empresa.js"></script>
         <script>loadTabla()</script>



   </div>

  </div>

 <?php

 $html->footer()
 ;
  ?>
