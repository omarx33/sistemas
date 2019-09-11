<?php 

class Message
{


function __construct()
{

}


function mensaje($titulo,$tipo,$texto,$tiempo)
{

echo  '<script>
		swal({
		title: "'.$titulo.'",
		type:"'.$tipo.'",
		text: "'.$texto.'",
		timer: '.$tiempo.'000,
		showConfirmButton: false
		});
        </script>';

}



function send_url($url,$time)
{

echo '<script>
function pageslocation(){
  window.location="'.$url.'";
}
setTimeout(pageslocation,'.$time.'000);

</script>';


}



}



 ?>