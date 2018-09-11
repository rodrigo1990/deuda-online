<?php

$email=$_GET['email'];
$telefono=$_GET['telefono'];
$acree='TARSHOP';
$pauta=$_GET['pauta'];
$dni=$_GET['dni'];
$nombre=$_GET['nombre'];



      require("class.phpmailer.php");
      $mail = new PHPMailer();
      $mail->Host = "localhost";
      $mail->IsHTML(true);
        
      $cuerpo  = "
      <table>
      <tr>
      <td>
      ";

      switch ($acree) {
            case 'SANTANDER':
                  $cuerpo .= "
                  <a class='fancybox'><img src='https://www.deudaonline.com.ar/imagenes/quiero_pagar/1.png' style='margin-left: auto;margin-right: auto;display: block;'/></a>
                    <br>
                    Indicar al cajero <span><b>PAGO ABIERTO SIN FACTURA</b></span> <br> a nombre del <span><b>ESTUDIO JURIDICO PALMERO</b></span>
                    <br><br>
                    Rubro: <b>GESTION DE DEUDA</b>
                    <br>
                    Entidad: <b>0420</b>
                    <br>
                    Nro de referencia de pago:<b>".$acree."</b>";


                  $cuerpo .="
                  </td>
                  <td style='padding-top:84px'>
                  <br>
                  <br>
                  Los datos de su acuerdo de pago son: <br />     
                  <b>Nombre y Apellido:</b> " . $nombre . "<br>
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Teléfono:</b> " . $telefono . "<br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br>
                  <b>DEBE PRESIONAR EL BOTON CONFIRMAR PARA FINALIZAR LA VALIDACIÓN DEL ACUERDO:</b><br/><br/><br/>";
                 
                 
                  $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo.=
                  "
                  <tr>
                  <td></td>";

                  $cuerpo .= '<td><b><span style="display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;"><a style="color:#FFF; text-decoration:none;" href="https://www.deudaonline.com.ar/confirmar_acuerdo.php?dni='.$dni.'&nombre='.$nombre.'&pauta='.$pauta.'&acree='.$acree.'&tel='.$telefono.'&email='.$email.'">CONFIRMAR ACUERDO</a></span></b><br></td>';


                  $cuerpo .="
                  </tr>
                  </table>";
                  break;


            case 'COMAFI':
                  $cuerpo .= '
                  <a><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/1.png" alt="" style="margin-left: auto;margin-right: auto;display: block;" /></a>
                  <p style=" text-align: center;"class="leyenda_ts">Debe dirigirse a cualquier PAGO FÁCIL.<br />
                  Indicarle al cajero que hace un <strong>PAGO A EPBCOM2050 <br/>
                  <span class="pago_10dias">PLAN VÁLIDO SOLO POR 10 DÍAS CORRIDOS</span></strong></p>
                  <a class="fancybox" href="#medio_111"><img src="imagenes/quiero_pagar/1.png" alt="" /></a>
                       
                  <a class="fancybox" href="#tarjeta_american"><img src="imagenes/quiero_pagar/t1.png" alt="" /></a>
                  <a class="fancybox" href="#tarjeta_master"><img src="imagenes/quiero_pagar/t2.png" alt="" /></a>
                  <a class="fancybox" href="#tarjeta_visa"><img src="imagenes/quiero_pagar/t3.png" alt="" /></a>
                          
                   
                  <a class="fancybox" href="#medio_4"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/4.png" alt="" /></a>
                  <a class="fancybox" href="#medio_2"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/2.png" alt="" /></a>
                  <a class="fancybox" href="#medio_3"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/3.png" alt="" /></a>
                  <a class="fancybox" href="#medio_5"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/5.png" alt="" /></a>
                  <a class="fancybox" href="#medio_6"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/6.png" alt="" /></a> ';


                  $cuerpo .="
                  </td>
                  <td style='text-align: center;'>
                  <br>
                  <br>
                  Los datos de su acuerdo de pago son: <br />     
                  <b>Nombre y Apellido:</b> " . $nombre . "<br>
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Teléfono:</b> " . $telefono . "<br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br><br><br>
                  <b>DEBE PRESIONAR EL BOTON CONFIRMAR <br> PARA FINALIZAR LA VALIDACIÓN DEL ACUERDO:</b><br>
                  <b><span style='display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;'><a style='color:#FFF; text-decoration:none;' href='https://www.deudaonline.com.ar/confirmar_acuerdo.php?dni=".$dni."&nombre=".$nombre."&pauta=".$pauta."&acree=".$acree."&tel=".$telefono."&email=".$email."'>CONFIRMAR ACUERDO</a></span></b><br>
                  ";
                 
                 
                  $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo.=
                  "
                  <tr style='text-align: center;'>
                  ";

                  $cuerpo .= '

                  ';


                  $cuerpo .="
                  </tr>
                  </table>";


                  break;


            case 'TARSHOP':
                  $cuerpo .= '
                  <a><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/7.png" alt="" /></a>
                  <p class="leyenda_ts">Debe dirigirse a cualquier PAGO FÁCIL o RAPIPAGO.
                  Indicarle al cajero que hace un PAGO SIN FACTURA A LA ENTIDAD <strong>TARJETA SHOPPING saldo deudor con su nro de DNI.</strong></p>
                  <a class="fancybox" href="#medio_111"><img src="imagenes/quiero_pagar/1.png" alt="" /></a>
           
                  <a class="fancybox" href="#tarjeta_american"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/t1.png" alt="" /></a>
                  <a class="fancybox" href="#tarjeta_master"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/t2.png" alt="" /></a>
                  <a class="fancybox" href="#tarjeta_visa"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/t3.png" alt="" /></a>
              
             
                  <a class="fancybox" href="#medio_4"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/4.png" alt="" /></a>
                  <a class="fancybox" href="#medio_2"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/2.png" alt="" /></a>
                  <a class="fancybox" href="#medio_3"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/3.png" alt="" /></a>
                  <a class="fancybox" href="#medio_5"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/5.png" alt="" /></a>
                  <a class="fancybox" href="#medio_6"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/6.png" alt="" /></a>   ';


                  $cuerpo .="
                  </td>
                  </tr>
                  <tr style='text-align:center'>
                  Los datos de su acuerdo de pago son: <br />     
                  <b>Nombre y Apellido:</b> " . $nombre . "<br>
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Teléfono:</b> " . $telefono . "<br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br>
                  <b>DEBE PRESIONAR EL BOTON CONFIRMAR PARA FINALIZAR LA VALIDACIÓN DEL ACUERDO:</b><br/><br/><br/>
                  <b><span style='display:inline-block; background:#1a9cd6; border-radius:3px; color:#FFF; padding:10px 15px;'><a style='color:#FFF; text-decoration:none;' href='https://www.deudaonline.com.ar/confirmar_acuerdo.php?dni=".$dni."&nombre=".$nombre."&pauta=".$pauta."&acree=".$acree."&tel=".$telefono."&email=".$email."'>CONFIRMAR ACUERDO</a></span></b><br>

                  ";
                 
                 
                  $cuerpo .= "
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
    
      echo "El e-mail con el acuerdo de pago se envio correctamente.<br />Ingrese a su cuenta de email para confirmar el acuerdo";
    
?>