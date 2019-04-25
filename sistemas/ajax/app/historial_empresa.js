var objeto =  "historial_empresa";

function loadTabla(fecha,empresa,codigo){
    var parametros = {"fecha":fecha,"empresa":empresa,"codigo":codigo};
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
  var empresa    = $('#empresa').val();
  var codigo      = $('#codigo').val();

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
    loadTabla(fecha,empresa,codigo);
    }
  });
  event.preventDefault();
  });




  $(document).ready(function() {
  // Parametros para el combo
  $("#empresa").change(function () {
  $("#empresa option:selected").each(function () {
  elegido=$(this).val();
  $.post("../../ajax/select/select_historial.php", { elegido: elegido }, function(data){
  $("#id_detalle").html(data);
  });
  });
  });
  });
