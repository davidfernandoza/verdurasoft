<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';



class SendEmail{

  // Metodos
  public function email($nombreFrom, $emailFrom, $nombreSend, $emailSend, $mensaje, $asunto)
  {

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->isSMTP();
      $mail->SMTPDebug = 0;
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'verdurasoft@gmail.com';
      $mail->Password   = 'verdurasoft123';
      $mail->SMTPSecure = 'tls';
      $mail->Port       = 587;

      //Recipients
      $mail->setFrom('verdurasoft@gmail.com', 'VerduraSoft');
      $mail->addAddress($emailSend, $nombreSend);


      // Content
      $mail->isHTML(true);
      $mail->Subject = $asunto . $nombreFrom;
      $mail->Body    = "<h1> Hola! </h1> <br> <p>".$mensaje."</p> <br> <strong>De:</strong> <em>".$nombreFrom." </em><br> <strong>Email:</strong> <em>".$emailFrom."</em>";

      $mail->send();
      return 200;
    }
    catch (Exception $e) {
      return 500;
    }
  }
}
