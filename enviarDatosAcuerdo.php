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
        
      $cuerpo  = "
      <table style='background-color: #f3f3ff;border: 5px solid #909090;font-size:1rem;margin-left: auto;margin-right: auto;'>
      <tr>
      <td style='text-align: center;'>
      ";

      switch ($acree) {
            case 'SANTANDER':
                  $cuerpo .= "
                  <a class='fancybox'><img src='https://www.deudaonline.com.ar/imagenes/quiero_pagar/1.png' style='margin-left: auto;margin-right: auto;display: block;'/></a>
                    Indicar al cajero <span><b>PAGO ABIERTO SIN FACTURA</b></span> <br> a nombre del <span><b>ESTUDIO JURIDICO PALMERO</b></span>
                    <br><br>
                    Rubro: <b>GESTION DE DEUDA</b>
                    <br>
                    Entidad: <b>0420</b>
                    <br>
                    Nro de referencia de pago:<b>".$acree."</b>
                    <br>
                    <br>
                    ";

                  $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo  .= "
                  <tr>
                  <td style='text-align: center;border-top: 1px solid #a5a2a2;'>
                  ";

                  $cuerpo .="
                  <br>
                  Los datos de su acuerdo de pago son: <br /> <br />    
                  <b>Nombre y Apellido:</b> " . $nombre . "<br><br />
                  <b>DNI:</b> " . $dni . "<br><br />
                  <b>Teléfono:</b> " . $telefono . "<br><br />
                  <b>Acuerdo de pago:</b> " . $pauta . "<br><br />
                  <b>DEBE PRESIONAR EL BOTON CONFIRMAR PARA FINALIZAR LA VALIDACIÓN DEL ACUERDO:</b><br/><br/>";

                  $cuerpo .= '<b><span style="display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;"><a style="color:#FFF; text-decoration:none;" href="http://www.legioncreativa.com/test/deuda_online/confirmar_acuerdo.php?dni='.$dni.'&nombre='.$nombre.'&pauta='.$pauta.'&acree='.$acree.'&tel='.$telefono.'&email='.$email.'">HAGA CLICK AQUI PARA CONFIRMAR SU ACUERDO</a></span></b><br>';
                 
                 
                  $cuerpo .= "
                  </td>
                  </tr>";

                

                  


                  $cuerpo .="
                  </table>";
                  break;


            case 'COMAFI':
                  $cuerpo .= '
                  <a><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/1.png" alt="" style="margin-left: auto;margin-right: auto;display: block;" /></a>
                  <p style=" text-align: center;"class="leyenda_ts">Debe dirigirse a cualquier PAGO FÁCIL.<br />
                  Indicarle al cajero que hace un <strong>PAGO A EPBCOM2050 <br/>
                  <span class="pago_10dias">PLAN VÁLIDO SOLO POR 10 DÍAS CORRIDOS</span></strong></p>
                  <a class="fancybox" href="#medio_111"><img src="imagenes/quiero_pagar/1.png" alt="" /></a>
                       
                 ';


                   $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo .= "
                  <tr>
                  <td style='text-align: center;border-top: 1px solid #a5a2a2;'>";

                  $cuerpo .="
                  <br>
                  Los datos de su acuerdo de pago son: <br /><br>     
                  <b>Nombre y Apellido:</b> " . $nombre . "<br><br>
                  <b>DNI:</b> " . $dni . "<br><br>
                  <b>Teléfono:</b> " . $telefono . "<br><br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br><br>
                  <b>DEBE PRESIONAR EL BOTON CONFIRMAR PARA FINALIZAR LA VALIDACIÓN DEL ACUERDO:</b><br><br>
                  <b><span style='display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;'><a style='color:#FFF; text-decoration:none;' href='http://www.legioncreativa.com/test/deuda_online/confirmar_acuerdo.php?dni=".$dni."&nombre=".$nombre."&pauta=".$pauta."&acree=".$acree."&tel=".$telefono."&email=".$email."'>HAGA CLICK AQUI PARA CONFIRMAR SU ACUERDO</a></span></b><br>
                  ";
                 
                 
                  $cuerpo .= "
                  </td>
                  </tr>";

                


                  $cuerpo .="
                  </tr>
                  </table>";


                  break;


            case 'TARSHOP':
                  $cuerpo .= '
                  <a><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/7.png" alt="" style="margin-left: auto;margin-right: auto;display: block;" /></a>
                  <p style="text-align:center"class="leyenda_ts">Debe dirigirse a cualquier PAGO FÁCIL o RAPIPAGO.<br>
                  Indicarle al cajero que hace un PAGO SIN FACTURA A LA ENTIDAD <br> <strong>TARJETA SHOPPING saldo deudor con su nro de DNI.</strong></p>';
                 


                  $cuerpo .="
                  </td>
                  </tr>
                  <tr style='text-align:center'>
                  <td style='border-top: 1px solid #cecece;padding: 20px;'>
                  Los datos de su acuerdo de pago son: <br /><br />      
                  <b>Nombre y Apellido:</b> " . $nombre . "<br><br /> 
                  <b>DNI:</b> " . $dni . "<br><br /> 
                  <b>Teléfono:</b> " . $telefono . "<br><br /> 
                  <b>Acuerdo de pago:</b> " . $pauta . "<br><br /> 
                  <b>DEBE PRESIONAR EL BOTON CONFIRMAR PARA FINALIZAR LA VALIDACIÓN DEL ACUERDO:</b><br/><br/><br/>
                  <b><span style='display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;'><a style='color:#FFF; text-decoration:none;' href='http://www.legioncreativa.com/test/deuda_online/confirmar_acuerdo.php?dni=".$dni."&nombre=".$nombre."&pauta=".$pauta."&acree=".$acree."&tel=".$telefono."&email=".$email."'>HAGA CLICK AQUI PARA CONFIRMAR SU ACUERDO</a></span></b><br>

                  ";
                 
                 
                  $cuerpo .= "
                  <td>
                  </tr>";

            

                  $cuerpo .="
            
                  </table>";


                  break;
            
            
      }
      

      

      






      $mail->From = "info@c1250353.ferozo.com";
      $mail->FromName = "Deuda Online";
      $mail->Subject = "Confirmacion de acuerdo de deuda";
      $mail->AddAddress($email,"Deuda Online");
      $mail->Body = $cuerpo;
      $mail->AltBody = "";
      $mail->Send();
    
      echo '
          <div class="tilde">
          <img src="imagenes/quiero_pagar/tilde.png" class="center-block">
          <h3>¡ACUERDO ENVIADO!</h3>
          </div>
      ';
    
?>