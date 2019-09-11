<?php
include'../autoload.php';
include'../session.php';

$assets = new Assets();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../librerias/PHPMailer/src/Exception.php');
require_once('../librerias/PHPMailer/src/PHPMailer.php');
require_once('../librerias/PHPMailer/src/SMTP.php');

$assets->sweetalert();


$ticket = new Ticket();

$objeto = $_REQUEST['ticket'];

 $usuario = $ticket->DatosTicket_Cab($objeto,'fullname');
 $detalleticket = $ticket->DatosTicket_Cab($objeto,'detalle');
 $correousuario=$ticket -> DatosTicket_Cab($objeto,'correo');
 $usuariosoporte = $_SESSION[KEY.NOMBRES] .' '.$_SESSION[KEY.APELLIDOS];
 $correosoporte=$ticket -> DatosTicket_Cab($objeto,'correo_soporte');


$ticket->asignar($_SESSION[KEY.ID],$objeto);

//-------

$mail = new PHPMailer(true);
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
);                                  // Set mailer to use SMTP
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
        $mail->Subject = 'Ticket Registrado N°'.$objeto;
        $mail->Body='
                  <html>
                  <head>
                  <title>Ticket Asignado</title>
                  <style>

                  body{font-family: arial;   font-weight: bold;}

                  </style>
                  </head>
                  <body>
                  <h1>Asignación de Ticket # '.$objeto.'</h1>
                  <hr>
                  <h2>Hola '.$usuario.' el ticket # '.$objeto.'
                  fue asignado a '.$usuariosoporte.'.
                  <br>
                  Se contactara contigo para poder resolver el detalle de tu ticket generado.
                  <br>
                  <p>Por favor, no responder a este e-mail. El mensaje le fue enviado usando un sistema automatizado. Esta dirección de e-mail no es revisada ni monitoreada, por lo tanto no recibirá¡ ninguna respuesta.
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

  header('Location: http://sistemas.rockdrillgroup.info/pages/ticket_asignar.php');





} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
}



//header('Location: http://sistemas.rockdrillgroup.info/pages/ticket_asignar.php');

 ?>
