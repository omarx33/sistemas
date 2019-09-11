var objeto =  "actualizar-ticket";

function loadTabla(id){
    var parametros = {"action":"ajax","id":id};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/actualizar-detalle/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("Cargando");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }

  $( "#agregar" ).submit(function( event ) {
  var parametros = $(this).serialize();
  var  id        = $("#id").val();
  $.ajax({
    type: "POST",
    url:'../controlador/'+objeto+'/agregar.php',
    data: parametros,
     beforeSend: function(objeto){
      $("#mensaje").html("Mensaje: Cargando...");
      },
    success: function(datos){
    $("#mensaje").html(datos);//mostrar mensaje
    //$('#agregar').modal('hide'); // ocultar  formulario
    $("#agregar")[0].reset();  //resetear inputs
    $('#newModal').modal('hide');  // ocultar modal
    loadTabla(id);
    }
  });
  event.preventDefault();
  });





$('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })



$( "#eliminarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var  id        = $("#id").val();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#dataDelete').modal('hide');
          loadTabla(id);
          }
      });
      event.preventDefault();
    });




    $(document).ready(function() {
    // Parametros para el combo

    $("#empresa").change(function () {
    $("#empresa option:selected").each(function () {
    elegido=$(this).val();
    $.post("../ajax/select/maquina.php", { elegido: elegido }, function(data){
    $("#pc").html(data);
    });
    });
    });
    });
