<?php
  if (!isset($rootDir)) {
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
  }


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once ($rootDir . "/PHPMailer/PHPMailer.php");
require_once ($rootDir . "/PHPMailer/POP3.php");
require_once ($rootDir . "/PHPMailer/SMTP.php");
require_once ($rootDir . "/PHPMailer/Exception.php");

class SendCorreo {
	public static function enviar($correoDestino,$asunto,$mensaje){
        //Envio de correo recepcion
        $mail = new PHPMailer(true);
        try {
			$mail->isSMTP(); // Set mailer to use SMTP xd
            $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP 
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = "correo@gmail.com"; // SMTP username
            $mail->Password =  'Super clave';  // SMTP password
			$mail->SMTPSecure = 'ssl';
			$mail->CharSet = 'utf-8';
            $mail->IsHTML(true); // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to
            $mail->setFrom('correo@gmail.com', 'nombre');
			$mail->Subject = $asunto;
			$mail->Body = $mensaje;     
			$mail->addAddress($correoDestino);     

			if ($mail->Send()) {
				return 1;
			} else {
				return -1;
			}			
    	}catch (Exception $e) {
			return 0;
			// return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    	}
  	}
}