<?php 
	error_reporting(0);

	//variables POST
  	$dni_recibido = $_POST['dni'];
  	$tel1_recibido = $_POST['mail1'];
  	$tel2_recibido = $_POST['mail2'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo .= "<b>DNI:</b> " . $dni_recibido . "<br>";
    $cuerpo .= "<b>Mail 1:</b> " . $tel1_recibido . "<br>";
    $cuerpo .= "<b>Mail 2:</b> " . $tel2_recibido . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "Contacto por Mail";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>