$(document).ready(function(){

	 $("#login").click(function(){	
		  correo  = $("#correo").val();
		  pass    = $("#pass").val();
		  path    = $("#path").val();
		  $.ajax({
		   type: "POST",
		   url: "controlador/login.php",
			data: "correo="+correo+"&pass="+pass,
		   success: function(html){    
			if(html=='true')    
			{
             
			 window.location=""+path+"?ok";		
			}
			else if (html =='emptyname')
			{

			$("#mensaje").html("<script>swal({type:'warning',title:'Ingrese el Usuario',timer:2000,showConfirmButton: false})</script>");
			$('#correo').val("");
			$('#correo').focus();
			$('#pass').val("");

			}
			else if (html =='emptypwd')
			{

			$("#mensaje").html("<script>swal({type:'warning',title:'Ingrese la Contraseña',timer:2000,showConfirmButton: false})</script>");
			$('#pass').val("");
			$('#pass').focus();

			}
			else if (html =='emptynamepwd')
			{

			$("#mensaje").html("<script>swal({type:'warning',title:'Ingrese la Contraseña',timer:2000,showConfirmButton: false})</script>");
			$('#pass').val("");
			$('#pass').focus();

			}
			else   
			 {
	
			 $("#mensaje").html("<script>swal({type:'error',title:'Usuario o Contraseña Incorrectos',timer:2000,showConfirmButton: false})</script>");
			 $('#pass').val("");
			 $('#pass').focus();
			 
       
			}
		   },
		   beforeSend:function()
		   {

			$("#mensaje").html("Cargando...")
		   }
		  });
		return false;
	});
});