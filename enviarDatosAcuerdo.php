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
      
      $cuerpo =   "";


      $cuerpo  .= "
      <table style='font-size:1rem;margin-left: auto;margin-right: auto;font-family:arial;border-radius:10px;background-color: #f3f3ff;border:30px solid #f3f3ff '>
        <tr>
          <td>
          <img src='http://www.deudaonline.com.ar/imagenes/logo.png' style='width:300px;margin-left:auto;margin-right:auto;display:block'>
          </td>
        </tr>
        <tr>
          <td>
              <h2 style='text-align:center;font-family:verdana;color:grey;font-weight: 100;'>ACTIVASTE TU ACUERDO DE PAGO <br> ".strtoupper($pauta)."</h2>
          </td>
        </tr>

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
                    Nro de referencia de pago:<b>".$dni."</b>
                    <br>
                    <br>
                    ";

                  $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo  .= "
                  <tr>
                  <td style='text-align: center;'>
                  ";

                  $cuerpo .="
                  <br>
                  <b>Nombre y Apellido:</b> " . $nombre . "<br>
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Telefono:</b> " . $telefono . "<br>
                  <b>Email:</b> " . $email . "<br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br><br />
                  ";

                 // $cuerpo .= '<b><span style="display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;"><a style="color:#FFF; text-decoration:none;" href="http://www.legioncreativa.com/test/deuda_online/confirmar_acuerdo.php?dni='.$dni.'&nombre='.$nombre.'&pauta='.$pauta.'&acree='.$acree.'&tel='.$telefono.'&email='.$email.'">HAGA CLICK AQUI PARA CONFIRMAR SU ACUERDO</a></span></b><br>';
                 
                 
                  $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo .="
                  <tr>
                    <td>
                      <div class='pago_10dias text-center center-block' style='width:100%;color: grey;font-size: 20px;
                      text-align: center;font-family:verdana'>
                      EL PAGO DEBE REALIZARSE DENTRO DE LAS  PROXIMAS 72 HS <br> PARA DARLE VIGENCIA A LA OPCION  ELEGIDA
                    </div>
                    </td>
                  </tr>

                  ";

                

                  


                  $cuerpo .="
                  </table>";

                  break;


            case 'COMAFI':
                  $cuerpo .= '
                  <a><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/1.png" alt="" style="margin-left: auto;margin-right: auto;display: block;" /></a>
                  <p style=" text-align: center;"class="leyenda_ts">Debe dirigirse a cualquier PAGO FÁCIL.<br />
                  Indicarle al cajero que hace un <strong>PAGO A EPBCOM2050 <br/>
                  <a class="fancybox" href="#medio_111"><img src="imagenes/quiero_pagar/1.png" alt="" /></a>
                       
                 ';


                   $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo .= "
                  <tr>
                  <td style='text-align: center;'>";

                  $cuerpo .="
                  <br>
                  <b>Nombre y Apellido:</b> " . $nombre . "<br>
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Teléfono:</b> " . $telefono . "<br>
                  <b>Email:</b> " . $email . "<br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br><br>
                  ";

                  //$cuerpo .= "<b><span style='display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;'><a style='color:#FFF; text-decoration:none;' href='http://www.legioncreativa.com/test/deuda_online/confirmar_acuerdo.php?dni=".$dni."&nombre=".$nombre."&pauta=".$pauta."&acree=".$acree."&tel=".$telefono."&email=".$email."'>HAGA CLICK AQUI PARA CONFIRMAR SU ACUERDO</a></span></b><br>";
                 
                 
                  $cuerpo .= "
                  </td>
                  </tr>";

                  


                  $cuerpo .="
                  </tr>
                  <tr>
                    <td>
                      <div class='pago_10dias text-center center-block' style='width:100%;color: grey;font-size: 20px;
                      text-align: center;font-family:verdana'>
                      PLAN VALIDO SOLO POR 10 DÍAS CORRIDOS
                    </div>
                    </td>
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
                  <td style='padding: 20px;'>
                  <b>Nombre y Apellido:</b> " . $nombre . "<br> 
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Teléfono:</b> " . $telefono . "<br>
                  <b>Email:</b> " . $email . "<br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br> <br>

                  ";
                 
                 //$cuerpo .="b><span style='display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;'><a style='color:#FFF; text-decoration:none;' href='http://www.legioncreativa.com/test/deuda_online/confirmar_acuerdo.php?dni=".$dni."&nombre=".$nombre."&pauta=".$pauta."&acree=".$acree."&tel=".$telefono."&email=".$email."'>HAGA CLICK AQUI PARA CONFIRMAR SU ACUERDO</a></span></b><br>";
                 
                  $cuerpo .= "
                  <td>
                  </tr>";

                  $cuerpo .="
                  <tr>
                    <td>
                      <div class='pago_10dias text-center center-block' style='width:100%;color: grey;font-size: 20px;
                    text-align: center;font-family:verdana'>
                    TIENE TIEMPO HASTA EL 29 DEL MES CORRIENTE PARA ABONAR
                  </div>
                    </td>
                  </tr>


                  ";

            

                  $cuerpo .="
            
                  </table>";


                   $cuerpo .="";


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


      $cuerpo  = "Confirmación de acuerdo de pago: <br />";  
      $cuerpo .= "<b>Nombre y Apellido:</b> " . $nombre . "<br>";
      $cuerpo .= "<b>DNI:</b> " . $dni . "<br>";
      $cuerpo .= "<b>Teléfono:</b> " . $telefono . "<br>";
      $cuerpo .= "<b>Acreedor:</b> " . $acree . "<br>";
      $cuerpo .= "<b>Acuerdo de pago:</b> " . $pauta . "<br>";
      $mail->FromName = "Deuda Online";
      $mail->Subject = "Confirmacion de acuerdo de deuda - EPB";
      $mail->AddAddress("elimperio@epb.com.ar","Deuda Online");
      //$mail->AddAddress("mcd77.1990@gmail.com","Deuda Online");
      $mail->Body = $cuerpo;
      $mail->AltBody = "";
      $mail->Send();
    
?>