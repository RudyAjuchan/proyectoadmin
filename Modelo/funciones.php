<?php 
require 'Mailer/src/PHPMailer.php';
require 'Mailer/src/SMTP.php';

function enviarMail($destinatarios,$asunto,$mensaje){

	$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "admongt502.ti4@gmail.com";
    $mail->Password = "ucysrqivpaohafhp";
    $mail->SetFrom('admongt502.ti4@gmail.com','Proyecto Admón TI');
	$mail->isHTML(true); //Decimos que lo que enviamos es HTML
	$mail->CharSet = 'UTF-8';  // Configuramos el charset 
	/* $mail->AddEmbeddedImage('assets/img/logo_ceg_redondo.png', 'logoCEG'); */
    
	//Agregamos a todos los destinatarios
	foreach ($destinatarios as $correo => $nombre) {
		$mail->addAddress($correo,$nombre);
	}
	
	//Añadimos el asunto del mail
	$mail->Subject = $asunto; 

	//Mensaje del email
	$mail->Body    = '<div align="center">
						<h1>Proyecto Admón TI</h1>						
					  </div><br><br>'.
	'<p>'.$mensaje.'</p>';

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
		return 0;
     } else {
        echo "Message has been sent";
		return 1;
     }

}


?>