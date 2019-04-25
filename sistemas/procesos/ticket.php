<?php

session_start();
include('../bd/conexion.php');
include('../clases/Ticket.php');
include('../clases/Funciones.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Require PHPMailer files
    require_once('../librerias/PHPMailer/src/Exception.php');
    require_once('../librerias/PHPMailer/src/PHPMailer.php');
    require_once('../librerias/PHPMailer/src/SMTP.php');

$link=Conectarse();
$funciones = new Funciones();
$ticket = new Ticket();

if ($_REQUEST['tipo']=='asignar')

 {

$usuario=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'fullname');
$detalleticket=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'detalle');
$correousuario=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'correo');
$usuariosoporte=$_SESSION['sis_nombres'].' '.$_SESSION['sis_apellidos'];
$correosoporte=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'correo_soporte');

$ticket -> Asignar($_SESSION['sis_idusuario'],$_REQUEST['ticket']);
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.overprimegroup.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ticket@overprimegroup.com';                 // SMTP username
        $mail->Password = 'Overketov951';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ticket@overprimegroup.com', 'Tickets ROVHECO');
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress($correousuario);               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Ticket Registrado N°'.$correlativo;
        $mail->Body='
                  <html>
                  <head>
                  <title>Ticket Asignado</title>
                  <style>

                  body{font-family: arial;   font-weight: bold;}

                  </style>
                  </head>
                  <body>
                  <h1>Asignación de Ticket # '.$_REQUEST['ticket'].'</h1>
                  <hr>
                  <h2>Hola '.$usuario.' el ticket # '.$_REQUEST['ticket'].'
                  fue asignado a '.$usuariosoporte.'.
                  <br>
                  Se contactara contigo para poder resolver el detalle de tu ticket generado.
                  <br>
                  <p>Por favor, no responder a este e-mail. El mensaje le fue enviado usando un sistema automatizado. Esta direcciÃ³n de e-mail no es revisada ni monitoreada, por lo tanto no recibirÃ¡ ninguna respuesta.
                  </p>
                  <hr>
                  Detalle de ticket:
                  <br>
                  '.$detalleticket.'
                  <br>
                  <hr>
                  Atentamente.
                  <br>
                  @soporte_ti
                  </body>
                  </html>
                  ';
        $mail->CharSet = 'UTF-8';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

header('Location: http://192.168.1.8/sistemas/consulta/asignar?id=ok');
//header('Location: http://correo.rockdrillgroup.net/ticket/ticket-asignado.php?usuario='.$usuario.'&ticket='.$_REQUEST['ticket'].'&correosoporte='.urlencode($correosoporte).'&correousuario='.urlencode($correousuario).'&usuariosoporte='.urlencode($usuariosoporte).'&detalleticket='.urlencode($detalleticket));



}
 else if ($_REQUEST['tipo']=='responsable')
 {
$usuario=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'fullname');
$detalleticket=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'detalle');
$correousuario=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'correo');
//$usuariosoporte=$_SESSION['sis_nombres'].' '.$_SESSION['sis_apellidos'];
$usuariosoporte=$ticket -> MostrarDatos($_REQUEST['tecnico'],'nombres')
.' '.$ticket -> MostrarDatos($_REQUEST['tecnico'],'apellidos');
$correosoporte=$ticket -> DatosTicket_Cab($_REQUEST['ticket'],'correo_soporte');

	$ticket -> Responsable($_POST['tecnico'],$_REQUEST['ticket']);
  $mail2 = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          //$mail2->SMTPDebug = 2;                                 // Enable verbose debug output
          $mail2->isSMTP();                                      // Set mailer to use SMTP
          $mail2->Host = 'mail.overprimegroup.com';  // Specify main and backup SMTP servers
          $mail2->SMTPAuth = true;                               // Enable SMTP authentication
          $mail2->Username = 'ticket@overprimegroup.com';                 // SMTP username
          $mail2->Password = 'Overketov951';                           // SMTP password
          $mail2->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail2->Port = 587;                                    // TCP port to connect to

          //Recipients
          $mail2->setFrom('ticket@overprimegroup.com', 'Tickets ROVHECO');
          //$mail2->addAddress('joe@example.net', 'Joe User');     // Add a recipient
          $mail2->addAddress($correousuario);               // Name is optional
          //$mail2->addReplyTo('info@example.com', 'Information');
          //$mail2->addCC('cc@example.com');
          //$mail2->addBCC('bcc@example.com');

          //Attachments
          //$mail2->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //$mail2->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          //Content
          $mail2->isHTML(true);                                  // Set email format to HTML
          $mail2->Subject = 'Ticket Registrado N°'.$_REQUEST['ticket'];
          $mail2->Body='         <html>
                    <head>
                    <title>Ticket Reasignado</title>
                    <style>

                    body{font-family: arial;   font-weight: bold;}

                    </style>
                    </head>
                    <body>
                    <h1>Ticket Reasignado # '.$_REQUEST['ticket'].'</h1>
                    <hr>
                    <h2>Hola '.$usuario.' el ticket # '.$_REQUEST['ticket'].'
                    fue reasignado a  '.$usuariosoporte.'.
                    <br>
                    Se contactara contigo para poder resolver el detalle de tu ticket generado.
                    <br>
                    <p>Por favor, no responder a este e-mail. El mensaje le fue enviado usando un sistema automatizado. Esta direcciÃ³n de e-mail no es revisada ni monitoreada, por lo tanto no recibirÃ¡ ninguna respuesta.
                    </p>
                    <hr>
                    Detalle de ticket:
                    <br>
                    '.$detalleticket.'
                    <br>
                    <hr>
                    Atentamente.
                    <br>
                    @soporte_ti
                    </body>
                    </html>
                    ';
          $mail2->CharSet = 'UTF-8';
          $mail2->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail2->ErrorInfo;
      }

header('Location: http://192.168.1.8/sistemas/consulta/responsable?id=ok');
	//header('Location: http://correo.rockdrillgroup.net/ticket/ticket-transferido.php?usuario='.$usuario.'&ticket='.$_REQUEST['ticket'].'&correosoporte='.urlencode($correosoporte).'&correousuario='.urlencode($correousuario).'&usuariosoporte='.urlencode($usuariosoporte).'&detalleticket='.urlencode($detalleticket));



 }
 else if ($_REQUEST['tipo']=='actualizarTC')
 {
	$ticket -> ActualizarTicket_Cab($_REQUEST['ticket'],$_REQUEST['detalle'],$_REQUEST['actividad'],$_REQUEST['categoria'],$_REQUEST['tecnicoasignado'],$_REQUEST['prioridad']);


 }





 ?>
