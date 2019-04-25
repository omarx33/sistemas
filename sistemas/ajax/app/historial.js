var objeto =  "historial";



function loadTabla(fecha){
    var parametros = {"fecha":fecha};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }




$( "#consultar" ).submit(function( event ) {
var parametros = $(this).serialize();
var fecha      = $('#fecha').val();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto+'/consultar.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje
  //$('#agregar').modal('hide'); // ocultar  formulario
  //$("#consultar")[0].reset();  //resetear inputs
  $('#modal-consultar').modal('hide');  // ocultar modal
  loadTabla(fecha);
  }
});
event.preventDefault();
});
