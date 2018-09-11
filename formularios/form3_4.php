<?php 
	error_reporting(0);

	//variables POST
  	$numero_envio = $_POST['numero_envio'];
  	$monto = $_POST['monto'];
    $fecha = $_POST['fecha'];
    $titular_tarjeta = $_POST['titular_tarjeta'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $dni = $_POST['dni'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo .= "<b>Numero de envio de dinero:</b> " . $numero_envio . "<br>";
    $cuerpo .= "<b>Monto abonado:</b> " . $monto . "<br>";
    $cuerpo .= "<b>Fecha:</b> " . $fecha . "<br>";
    $cuerpo .= "<b>Titular de la tarjeta de credito:</b> " . $titular_tarjeta . "<br>";
    $cuerpo .= "<b>Nombre y Apellido:</b> " . $nombre . "<br>";
    $cuerpo .= "<b>Telefono de contacto:</b> " . $telefono . "<br>";
    $cuerpo .= "<b>DNI:</b> " . $dni . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "Formulario de contacto - INFORMAR PAGO MERCADOPAGO";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>