<?php 
	error_reporting(0);

	//variables POST
  	$dni = $_POST['dni'];
  	$monto = $_POST['monto'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo .= "<b>DNI:</b> " . $dni . "<br>";
    $cuerpo .= "<b>Monto:</b> " . $monto . "<br>";
    $cuerpo .= "<b>Fecha:</b> " . $fecha . "<br>";
    $cuerpo .= "<b>Telefono de contacto:</b> " . $telefono . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "Formulario de contacto - INFORMAR PAGO PAGO FACIL";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>