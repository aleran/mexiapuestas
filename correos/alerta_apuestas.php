<?php
		require 'lib/PHPMailer/PHPMailerAutoload.php';
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.hostinger.co';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "cuentas@mexiapuestas.net";
		//Password to use for SMTP authentication
		$mail->Password = "cuentas123#mexi";
		//Set who the message is to be sent from
		$mail->setFrom('cuentas@mexiapuestas.net', 'Mexiapuestas');
		//Set an alternative reply-to address
		$mail->addReplyTo('cuentas@mexiapuestas.net', 'Mexiapuestas');
		//Set who the message is to be sent to
		$mail->addAddress("ale.ran92@gmail.com", 'Alejandro Rangel');
		$mail->addCC('alejandrocendales@hotmail.com');
		//Set the subject line
		$mail->Subject = 'Jugada de de monto alto '.$ticket.'';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->Body    = '<span style="font-size: 17px;">Se ha realizado una apuesa de monto: <b>'.$_POST["monto"].'</b> con ganancia de: <b>'.$_POST["premio"].'</b>. Codigo de ticket: <b>'.$ticket.'</b> </span>';
		$mail->AltBody = 'Alerta de jugada';
		$mail->CharSet = 'UTF-8';
		//Attach an image file
		//send the message, check for errors
		$mail->send();
?>