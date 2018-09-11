<?php 
	error_reporting(0);

	//variables POST
  	$dni_recibido = $_POST['dni'];
  	$tel1_recibido = $_POST['tel1'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo .= "<b>DNI:</b> " . $dni_recibido . "<br>";
    $cuerpo .= "<b>Tel:</b> " . $tel1_recibido . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "DAR DE BAJA TELEFONO";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>