<?php
	$caracteres = "abcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		$numerodeletras=7; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada
		for($i=0;$i<$numerodeletras;$i++)
		{
	    	$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
		}
	$sql_cambio="UPDATE usuarios SET clave ='".md5($cadena)."' WHERE correo='".$_POST["correo"]."' ";
	$rs_cambio=mysqli_query($mysqli,$sql_cambio) or die(mysql_error($mysqli));
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
		$mail->Host = 'mail.mexiapuestas.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 465;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'ssl';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "cuentas@mexiapuestas.com";
		//Password to use for SMTP authentication
		$mail->Password = "cuentas123#mexi";
		//Set who the message is to be sent from
		$mail->setFrom('cuentas@mexiapuestas.com', 'Mexiapuestas');
		//Set an alternative reply-to address
		$mail->addReplyTo('cuentas@mexiapuestas.com', 'Mexiapuestas');
		//Set who the message is to be sent to
		$mail->addAddress($_POST["correo"], 'usuario');
		//Set the subject line
		$mail->Subject = 'Restablecer Contraseña';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->Body    = '<br><br>Se ha restablecido la contraseña con éxito su nueva clave es: '.$cadena.'<br>se recomienda cambiar la clave al ingresar nuevamente al sistema. <br>Por favor no responda este correo ya que es generado automáticamente por el sistema';
		$mail->AltBody = 'probandosss';
		$mail->CharSet = 'UTF-8';

		//Attach an image file
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "<script>alert('Ha ocurrido un error vuelva a intentarlo');</script>". ": " . $mail->ErrorInfo;
		} else {
		    echo "<script>alert('Se le ha enviado un correo con su contraseña, revisar en Spam o en la carpeta de correo no deseado en caso de que no le llegue el correo a la bandeja de entrada');window.location='index.php';</script>";
		}
?>
