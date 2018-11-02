<?php  
	require("../../class.phpmailer.php");

	$nombre = $_POST['nombre'];
	$documento = $_POST['documento'];
	$cuotas = $_POST['cuotas'];
  $banco = $_POST['banco'];

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
      $cuerpo .="</td>";
    $cuerpo .="</tr>";
  
    $cuerpo.="</table>";


  $mail->From = "info@c1250353.ferozo.com";
  	$mail->FromName = "Deuda Online";
	 $mail->Subject = "Solicitud de aumento de cantidad de cuotas";
    $mail->AddAddress("mcd77.1990@gmail.com","Deuda Online");
    $mail->Body = $cuerpo;
     $mail->AltBody = "";
     $mail->Send();
 	echo "Formulario enviado correctamente.";



?>