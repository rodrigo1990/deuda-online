<?php 
	error_reporting(0);

	//variables POST
  	$nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $motivo = $_POST['motivo'];
    $cuenta = $_POST['cuenta'];
    $mail = $_POST['mail'];
    $cel = $_POST['cel'];
 
	require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
     $cuerpo .= "<b>Nombre y Apellido:</b> " . $nombre . "<br>";
      $cuerpo .= "<b>DNI:</b> " . $dni . "<br>";
      $cuerpo .= "<b>Motivo de la consulta:</b> " . $motivo . "<br>";
      $cuerpo .= "<b>Mail:</b> " . $mail . "<br>";
      $cuerpo .= "<b>Cel:</b> " . $cel . "<br>";
                    
    $mail->From = "info@legionvps.com";
    $mail->FromName = "Deuda Online";
    $mail->Subject = "Contacto por telefono";
    $mail->AddAddress("deudaonline@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
    $mail->AltBody = "";
    $mail->Send();
 	
 	echo "Formulario enviado correctamente.";
?>