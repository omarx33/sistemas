<?php
include'../autoload.php';
include'../session.php';


$assets = new Assets();
$html   = new Html();
$message  = new Message();

$assets->principal('Usuarios');
$assets->datatables();
$assets ->sweetalert();
$html->header();

include'../vista/modal/usuarios/agregar.php';
include'../vista/modal/usuarios/eliminar.php';
 ?>



 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12">

       <?php include'../vista/nav.php'; ?>

     </div>



<div class="row">

         <div class="col-md-12">


           <div class="pull-right">
           <a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i>  Agregar Registro</a>
           </div>


         <div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
         <div id="mensaje"></div><!-- Datos ajax Final -->
         <div id="tabla"></div><!-- Datos ajax Final -->
         </div>
 </div>
         <script src="../ajax/app/usuarios.js"></script>
         <script>loadTabla(1)</script>



   </div>

  </div>

 <?php

 $html->footer()
 ;
  ?>
