<?php  
	require("../../class.phpmailer.php");

	$nombre = $_POST['nombre'];
	$documento = $_POST['documento'];
	$cuotas = $_POST['cuotas'];
  $banco = $_POST['banco'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $franjaHoraria = $_POST['franjaHoraria'];

	$cuerpo = "";
	$mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->IsHTML(true);
			
    $cuerpo  = "
      <table style='font-size:1rem;margin-left: auto;margin-right: auto;font-family:arial;border-radius:10px;background-color: #f3f3ff;border:30px solid #f3f3ff;text-align:center; '>";

    $cuerpo.="<tr>
              <td>
              <img src='http://www.deudaonline.com.ar/imagenes/logo.png' style='width:300px;margin-left:auto;margin-right:auto;display:block'>
              </td>
            </tr>";

    $cuerpo .="<tr>";
      $cuerpo .="<td>";
        $cuerpo .= "<b>Nombre</b>: ".$nombre."<br>";
        $cuerpo .= "<b>Documento</b>: ".$documento."<br>";
        $cuerpo .= "<b>Banco</b>: ".$banco."<br>";
        $cuerpo.= "<b>Cantidad de cuotas:</b> ".$cuotas."<br>";
        $cuerpo.= "<b>Telefono:</b> ".$telefono."<br>";
        $cuerpo.= "<b>Email:</b> ".$email."<br>";
        $cuerpo.= "<b>franja horaria:</b> ".$franjaHoraria."<br>";
      $cuerpo .="</td>";
    $cuerpo .="</tr>";
  
    $cuerpo.="</table>";


  $mail->From = "info@c1250353.ferozo.com";
  	$mail->FromName = "Deuda Online";
	 $mail->Subject = "Solicitud de aumento de cantidad de cuotas";
    $mail->AddAddress("elimperio@epb.com.ar","Deuda Online");
    $mail->AddAddress("calidad@epb.com.ar","Deuda Online");
    $mail->Body = $cuerpo;
     $mail->AltBody = "";
     $mail->Send();
 	echo "Formulario enviado correctamente.";



?>