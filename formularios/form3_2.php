<?php 
	error_reporting(0);

	//variables POST
  	$dni = $_POST['dni'];
    $banco_envia = $_POST['banco_envia'];
    $banco_recibe = $_POST['banco_recibe'];
    $numero_operacion = $_POST['numero_operacion'];
    $monto = $_POST['monto'];
    $fecha = $_POST['fecha'];
    $numero_cuenta = $_POST['numero_cuenta'];
  	$telefono = $_POST['telefono'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo .= "<b>Transferencia:</b> " . $transferencia . "<br>";
    $cuerpo .= "<b>DNI:</b> " . $dni . "<br>";
    $cuerpo .= "<b>Banco que envia:</b> " . $banco_envia . "<br>";
    $cuerpo .= "<b>Banco que recibe:</b> " . $banco_recibe . "<br>";
    $cuerpo .= "<b>Numero de operacion:</b> " . $numero_operacion . "<br>";
    $cuerpo .= "<b>Monto transferido:</b> " . $monto . "<br>";
    $cuerpo .= "<b>Fecha y hora:</b> " . $fecha . "<br>";
    $cuerpo .= "<b>Numero de la cuenta receptora:</b> " . $numero_cuenta . "<br>";
    $cuerpo .= "<b>Telefono de contacto:</b> " . $telefono . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "Formulario de contacto - INFORMAR PAGO TRANSFERENCIA";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>