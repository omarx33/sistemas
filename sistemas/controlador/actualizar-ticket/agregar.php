<?php

include'../../autoload.php';
include'../../session.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../../librerias/PHPMailer/src/Exception.php');
require_once('../../librerias/PHPMailer/src/PHPMailer.php');
require_once('../../librerias/PHPMailer/src/SMTP.php');


 $funciones   =  new Funciones();

 $message = new Message();
//-------------detalle del historial
$nro_ticket = $funciones->validar_xss($_POST['idnumero']);
$descripcion    = $funciones->validar_xss($_POST['detalle']);
  $fechas    = $funciones->validar_xss($_POST['fecha']);
  $estados   = $funciones->validar_xss($_POST['estado']);
$empresa = $_POST['empresa'];
$codigo_pc = $_POST['maquina'];
$persona = $_POST['persona'];//si
if ($persona == 'si') {
  Ticket_detalle::agregar_estado($codigo_pc,$nro_ticket,$empresa,$descripcion,$estados,$fechas);
}


//---
 if (isset($_POST['estado']) AND isset($_POST['fecha']) AND isset($_POST['detalle']) AND isset($_POST['h_hombre']) AND isset($_POST['idnumero'])  )
 {


  $estado   = $funciones->validar_xss($_POST['estado']);
  $fecha    = $funciones->validar_xss($_POST['fecha']);
  $detalle    = $funciones->validar_xss($_POST['detalle']);
  $h_hombre = $funciones->validar_xss($_POST['h_hombre']);
 $idnumero = $funciones->validar_xss($_POST['idnumero']);
  $tecnico  = $funciones->validar_xss($_SESSION[KEY.ID]);

 $detalle_user    = $funciones->validar_xss($_POST['detalle_user']);

//-----------------------------------------------

 $correo =  Ticket_detalle::consulta_nav($idnumero,'correo');
 $correo2 =  Ticket_detalle::consulta_nav($idnumero,'correo_soporte');
 $usuario =  Ticket_detalle::consulta_nav($idnumero,'fullname');
 $correo_detalle = Ticket_detalle::consulta_nav($idnumero,'detalle');
 $empresa = Ticket_detalle::consulta_nav($idnumero,'empresas');

 if (strlen($estado)>0 AND strlen($fecha)>0 AND strlen($detalle)>0 AND strlen($h_hombre)>0 AND strlen($idnumero)>0 )
 {

$ticket_detalle = new Ticket_detalle();
$valor = $ticket_detalle->agregar($estado,$detalle,$fecha,$h_hombre,$idnumero,$tecnico);

if ($estado == '08') {
$valor2 = Ticket_detalle::actualizar_estado($estado,$idnumero);


//-------
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
        //Server settings
              //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
              $mail->isSMTP();
              $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
      );
      $mail->Host = 'mail.overprimegroup.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'ticket@overprimegroup.com';                 // SMTP username
      $mail->Password = 'Overketov951';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;
      $mail->setFrom('ticket@overprimegroup.com', 'Tickets ROVHECO');
      //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
      $mail->addAddress($correo);
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Ticket Solucionado N°'.$idnumero;
      $mail->Body='
          <html>
          <head>
          <title>Ticket Solucionado N°'.$idnumero.'</title>
          <style>

          body{font-family: arial;   font-weight: bold;}

          </style>
          </head>
          <body>
          <h1>Solución de Ticket N° '.$idnumero.'</h1>
          <hr>
          Hola '.$usuario.', el ticket N° '.$idnumero.'  con el detalle:
          <br>'.$correo_detalle.'<br><br>
          Ha sido solucionado con el siguiente detalle:
          <br>
          '.$detalle_user.'

          <hr>
          Atentamente. <br> @soporte_'.$empresa.'


          <br>
          <p>Por favor, no responder a este e-mail. El mensaje le fue enviado usando un sistema automatizado. Esta dirección de e-mail no es revisada ni monitoreada, por lo tanto no recibirá ninguna respuesta.
          </p>
          </body>
          </html>
          ';
      $mail->CharSet = 'UTF-8';
      $mail->send();


      } catch (Exception $e) {
          echo 'Error de correo: ', $mail->ErrorInfo;
      }


//----------
}elseif ($estado == '09') {

  $valor2 = Ticket_detalle::actualizar_estado($estado,$idnumero);


  //-------
  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
          //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();
                $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
        $mail->Host = 'mail.overprimegroup.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ticket@overprimegroup.com';                 // SMTP username
        $mail->Password = 'Overketov951';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->setFrom('ticket@overprimegroup.com', 'Tickets ROVHECO');
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress($correo);
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Ticket Anulado N°'.$idnumero;
        $mail->Body='
            <html>
            <head>
            <title>Ticket Anulado N°'.$idnumero.'</title>
            <style>

            body{font-family: arial;   font-weight: bold;}

            </style>
            </head>
            <body>
            <h1>Anulación de Ticket N° '.$idnumero.'</h1>
            <hr>
            Hola '.$usuario.', el ticket N° '.$idnumero.'  con el detalle:
            <br>'.$correo_detalle.'<br><br>
            Ha sido anulado con el siguiente detalle:
            <br>
            '.$detalle_user.'

            <hr>
            Atentamente. <br> @soporte_'.$empresa.'


            <br>
            <p>Por favor, no responder a este e-mail. El mensaje le fue enviado usando un sistema automatizado. Esta dirección de e-mail no es revisada ni monitoreada, por lo tanto no recibirá ninguna respuesta.
            </p>
            </body>
            </html>
            ';
        $mail->CharSet = 'UTF-8';
        $mail->send();


        } catch (Exception $e) {
            echo 'Error de correo: ', $mail->ErrorInfo;
        }


}elseif ($estado == '10') {
  $valor2 = Ticket_detalle::actualizar_estado($estado,$idnumero);


  //-------
  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
          //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();
                $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
        $mail->Host = 'mail.overprimegroup.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ticket@overprimegroup.com';                 // SMTP username
        $mail->Password = 'Overketov951';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->setFrom('ticket@overprimegroup.com', 'Tickets ROVHECO');
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress($correo);
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Ticket No Solucionado N°'.$idnumero;
        $mail->Body='
            <html>
            <head>
            <title>Ticket No Solucionado N°'.$idnumero.'</title>
            <style>

            body{font-family: arial;   font-weight: bold;}

            </style>
            </head>
            <body>
            <h1>No Solución de Ticket N° '.$idnumero.'</h1>
            <hr>
            Hola '.$usuario.', el ticket N° '.$idnumero.'  con el detalle:
            <br>'.$correo_detalle.'<br><br>
            No a sido solucionado con el siguiente detalle:
            <br>
            '.$detalle_user.'

            <hr>
            Atentamente. <br> @soporte_'.$empresa.'


            <br>
            <p>Por favor, no responder a este e-mail. El mensaje le fue enviado usando un sistema automatizado. Esta dirección de e-mail no es revisada ni monitoreada, por lo tanto no recibirá ninguna respuesta.
            </p>
            </body>
            </html>
            ';
        $mail->CharSet = 'UTF-8';
        $mail->send();


        } catch (Exception $e) {
            echo 'Error de correo: ', $mail->ErrorInfo;
        }
}

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}




//-----------------------


}
else
{
  echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
}

}
else
{
echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}
 ?>
