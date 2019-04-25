var path  = "http://sistemas.rockdrillgroup.info/";


function logout(){

	$.ajax({
		url:path+'controlador/logout.php',
		type:'POST',
		async:true,
		data:{accion:'logout'},
		success:function()
		{
			self.location=path;
		},
		error:function(xhr,status,error)
		{
			alert('ERROR: '+error);
		}


	});
}
