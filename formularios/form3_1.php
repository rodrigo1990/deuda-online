<?php 
	error_reporting(0);

	//variables POST
  	$banco = $_POST['banco'];
  	$sucursal = $_POST['sucursal'];
    $numero = $_POST['numero'];
    $fecha = $_POST['fecha'];
    $monto = $_POST['monto'];
    $dni = $_POST['dni'];
  	$telefono = $_POST['telefono'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo .= "<b>Banco:</b> " . $banco . "<br>";
    $cuerpo .= "<b>Sucursal:</b> " . $sucursal . "<br>";
    $cuerpo .= "<b>Numero:</b> " . $numero . "<br>";
    $cuerpo .= "<b>Fecha:</b> " . $fecha . "<br>";
    $cuerpo .= "<b>Monto:</b> " . $monto . "<br>";
    $cuerpo .= "<b>Dni:</b> " . $dni . "<br>";
    $cuerpo .= "<b>Telefono de contacto:</b> " . $telefono . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "Formulario de contacto - INFORMAR PAGO DEPOSITO";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>