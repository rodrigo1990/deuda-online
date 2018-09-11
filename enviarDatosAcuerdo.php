<?php

$email=$_GET['email'];
$telefono=$_GET['telefono'];
$acree=$_GET['acree'];
$pauta=$_GET['pauta'];
$dni=$_GET['dni'];
$nombre=$_GET['nombre'];



      require("class.phpmailer.php");
      $mail = new PHPMailer();
      $mail->Host = "localhost";
      $mail->IsHTML(true);
        
	  $cuerpo  = "Los datos de su acuerdo de pago son: <br />";	
      $cuerpo .= "<b>Nombre y Apellido:</b> " . $nombre . "<br>";
      $cuerpo .= "<b>DNI:</b> " . $dni . "<br>";
      $cuerpo .= "<b>Teléfono:</b> " . $telefono . "<br>";
      $cuerpo .= "<b>Acuerdo de pago:</b> " . $pauta . "<br>";
	  $cuerpo .="<b>DEBE PRESIONAR EL BOTON CONFIRMAR PARA FINALIZAR LA VALIDACIÓN DEL ACUERDO:</b><br/><br/><br/>";
     
      $cuerpo .= '<b><span style="display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;"><a style="color:#FFF; text-decoration:none;" href="https://www.deudaonline.com.ar/confirmar_acuerdo.php?dni='.$dni.'&nombre='.$nombre.'&pauta='.$pauta.'&acree='.$acree.'&tel='.$telefono.'&email='.$email.'">CONFIRMAR ACUERDO</a></span></b><br>';
                      
      $mail->From = "info@c1250353.ferozo.com";
      $mail->FromName = "Deuda Online";
      $mail->Subject = "Confirmacion de acuerdo de deuda";
      $mail->AddAddress($email,"Deuda Online");
      $mail->Body = $cuerpo;
      $mail->AltBody = "";
      $mail->Send();
    
      echo "El e-mail con el acuerdo de pago se envio correctamente.<br />Ingrese a su cuenta de email para confirmar el acuerdo";
    
?>