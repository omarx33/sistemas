

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Require PHPMailer files
require_once('../librerias/PHPMailer/src/Exception.php');
require_once('../librerias/PHPMailer/src/PHPMailer.php');
require_once('../librerias/PHPMailer/src/SMTP.php');

if (isset($_REQUEST['usuario']) AND isset($_REQUEST['ticket']))
{
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
          $mail->addAddress($_REQUEST['correousuario']);               // Name is optional
          //$mail->addReplyTo('info@example.com', 'Information');
          $mail->addCC($_REQUEST['correosoporte']);
          //$mail->addBCC('bcc@example.com');

          //Attachments
          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = "Ticket Solucionado N°".$_REQUEST['ticket'];
          $mail->Body='
          <html>
          <head>
          <title>Ticket Solucionado N°'.$_REQUEST[ticket].'</title>
          <style>

          body{font-family: arial;   font-weight: bold;}

          </style>
          </head>
          <body>
          <h1>Solución de Ticket N° '.$_REQUEST[ticket].'</h1>
          <hr>
          Hola '.$_REQUEST[usuario].', el ticket N° '.$_REQUEST[ticket].'  con el detalle:
          <br>'.$_REQUEST[detalle].'<br><br>
          Ha sido solucionado con el siguiente detalle:
          <br>
          '.$_REQUEST[solucion].'

          <hr>
          Atentamente. <br> @soporte_'.$_REQUEST[empresa].'


          <br>
          <p>Por favor, no responder a este e-mail. El mensaje le fue enviado usando un sistema automatizado. Esta dirección de e-mail no es revisada ni monitoreada, por lo tanto no recibirá ninguna respuesta.
          </p>
          </body>
          </html>
          ';
          $mail->CharSet = 'UTF-8';
          $mail->send();
          echo 'Message has been sent';
          header('Location: http://localhost/sistemas/mensaje/correo-enviado');
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }

}
else
{
  header('Location: http://localhost/sistemas/mensaje/correo-enviado');
}



?>
