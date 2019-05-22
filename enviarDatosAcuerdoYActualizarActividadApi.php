<?php
require_once("Clases/Api.php");
$email=$_GET['email'];
$telefono=$_GET['telefono'];
$acree=$_GET['acree'];
$pauta=$_GET['pauta'];
$dni=$_GET['dni'];
$nombre=$_GET['nombre'];
$cuil = $_GET['cuil'];
$idContacto = $_GET['idContacto'];
$nombreAcreedor = $_GET['nombreAcreedor'];
$IdPlan = $_GET['idPlan'];
$total = $_GET['total'];
$cantCuotas = $_GET['cantCuotas'];
$idConsulta = $_GET['idConsulta'];
$medioPago = $_GET['medioPago'];

$partes=explode(" ", $_GET['pauta']);
$totalCuota=str_replace("$", "", $partes[4]);
$totalCuota=str_replace(".", "", $totalCuota);
$totalCuota=str_replace(",", ".", $totalCuota);

$api = new Api();

$resp2 = $api->modificarPlanTelefonoEmailYRetornarIdPLan($IdPlan,$idContacto,$idConsulta,$cantCuotas,$nombreAcreedor,$total,$telefono,$email);


      require("class.phpmailer.php");
      $mail = new PHPMailer();
      $mail->Host = "localhost";
      $mail->IsHTML(true);
      
      $cuerpo =   "";


      $cuerpo  .= "
      <table style='font-size:1rem;margin-left: auto;margin-right: auto;font-family:arial;border-radius:10px;background-color: #f3f3ff;border:30px solid #f3f3ff;text-align:center; '>
       
      ";

      switch ($acree) {
            case 'SANTANDER':

                $cuerpo.="
                <tr>
                      <td>
                  
                        <img src='http://www.deudaonline.com.ar/imagenes/logo.png' style='width:300px;margin-left:auto;margin-right:auto;display:block'>
                  
                      </td>

                </tr>";

                $cuerpo.="

                <tr>
                      <td>

                          <h2 style='text-align:center;font-family:verdana;color:grey;font-weight: 100;'>
                            ACTIVASTE TU ACUERDO DE PAGO CON <b>BANCO SANTANDER RIO</b> <br> ".strtoupper($pauta)."
                          </h2>

                      </td>

                    </tr>";

                if($medioPago=="medio-electronico"){

                   $cuerpo .= "
                  <tr>
                  <td style='text-align: center;'>
                    
                    <a class='fancybox'>
                      <img src='https://www.deudaonline.com.ar/imagenes/quiero_pagar/pmc.png' style='margin-left: auto;margin-right: auto;display: block;width:130px'/>
                    </a>


                        Buscar por nombre:<br><b>ESTUDIO PALMERO</b><br>
                        <b>Coloca el importe elegido y tu DNI.</b>
                    ";

                  $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo.="
                  <tr>
                    <td style='text-align:center'>
                      <h3 style='margin: 0;margin-top: 31px;color:black;'><u>Transferencia bancaria UNICAMENTE (NO deposito)</u></h3>
                        <br><b style='color:black;'>Banco Santander Rio</b><br>
                        CBU  0720000720000003710322<br>
                        Alias EPB.SANTANDER<br>
                        CUIT EPB 33-68716473-9<br>

                        <b>Coloca el importe elegido y tu DNI.</b>
                    <td>
                  </tr>

                  ";

                }else if($medioPago=="medio-efectivo")
                {


                   $cuerpo .= "
                  <tr>
                  <td style='text-align: center;'>
                    <h3>Abone por ventanilla con instruccion de pago SICE</h3>
                    <br>
                    <a href='test.legioncreativa.com/deuda_online/archivos_emails/santander-pago-electronico.php?total=".$totalCuota."&nombre=".$nombre."&dni=".$dni."&cuil=".$cuil."'>
                    Descargar instrucciones de pago SICE
                    </a>

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
                  <hr style='margin-left:auto;margin-right:auto;display:block;width:50px;height:3px;background-color:grey;'>
                  <br>
                  <a><img src='https://www.deudaonline.com.ar/imagenes/quiero_pagar/1.png' alt='' style='margin-left: auto;margin-right: auto;display: block;color:black;' /></a>
                  <p style=' text-align: center;color:black;'class='leyenda_ts'>Debe dirigirse a cualquier PAGO FACIL.<br />
                  Indicar pago abierto sin factura a nombre de <strong>Estudio Jurídico Palmero.</strong>
                   <br/>
                   <br>
                  <strong>Entidad:0420</strong>
                  <br/>
                 <b> Nro de referencia de pago: ".$dni."</b>
                  ";


                   $cuerpo .= "
                  </td>
                  </tr>";


                   

                }



                  $cuerpo  .= "
                  <tr>
                  <td style='text-align: center;'>
                  ";

                  $cuerpo .="
                  <br>
                  <hr style='margin-left:auto;margin-right:auto;display:block;width:50px;height:3px;background-color:grey;'>
                  <br>
                  <h2 style='text-align:center;font-family:verdana;color:grey;font-weight: 100;margin:0'>Estos son tus <b>datos personales</b> <br> </h2>
                  <br>
                  <b style='color:black;'>Nombre y Apellido:</b> " . $nombre . "<br>
                  <b style='color:black;'>DNI:</b> " . $dni . "<br>
                  <b style='color:black;'>Telefono:</b> " . $telefono . "<br>
                  <b style='color:black;'>Email:</b> " . $email . "<br>
                  <b style='color:black;'>Acuerdo de pago:</b> " . $pauta . "<br><br />
                  ";

                 
                 
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
                  
                   <tr>
                      <td>
                      <img src="http://www.deudaonline.com.ar/imagenes/logo.png" style="width:300px;margin-left:auto;margin-right:auto;display:block">
                      
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <h2 style="text-align:center;font-family:verdana;color:grey;font-weight: 100;">ACTIVASTE TU ACUERDO DE PAGO CON <b>BANCO COMAFI</b> <br> '.strtoupper($pauta).'</h2>
                      </td>
                    </tr>
                  
                  
                  <a><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/1.png" alt="" style="margin-left: auto;margin-right: auto;display: block;" /></a>
                  <p style=" text-align: center;"class="leyenda_ts">Debe dirigirse a cualquier PAGO FACIL.<br />
                  Indicarle al cajero que hace un <strong>PAGO A EPBCOM2050 con su numero de referencia de pago</strong> <br/>
                 <b> DNI: '.$dni.'</b>
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
                  <b>Telefono:</b> " . $telefono . "<br>
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
                      REALIZAR EL PAGO EN LAS PROXIMAS 72HS

                    </div>
                    </td>
                  </tr>
                  </table>";



                  break;


            case 'TARSHOP':
                  $cuerpo .= '
                  
                  
                  <tr>
                      <td>
                      <img src="http://www.deudaonline.com.ar/imagenes/logo.png" style="width:300px;margin-left:auto;margin-right:auto;display:block">
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <h2 style="text-align:center;font-family:verdana;color:grey;font-weight: 100;">ACTIVASTE TU ACUERDO DE PAGO CON <b>TARJETA SHOPPING</b> <br> '.strtoupper($pauta).'</h2>
                      </td>
                    </tr>
                  
                  
                  
                  <a><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/7.png" alt="" style="margin-left: auto;margin-right: auto;display: block;" /></a>
                  <p style="text-align:center"class="leyenda_ts">Debe dirigirse a cualquier PAGO FÁCIL o RAPIPAGO.<br>
                  Indicarle al cajero que hace un PAGO SIN FACTURA A LA ENTIDAD <br> <strong>TARJETA SHOPPING saldo deudor con su nro de DNI.</strong></p>
                   <br>
                    <br>
                    <a class="fancybox"><img src="https://www.deudaonline.com.ar/imagenes/quiero_pagar/pmc.png" style="margin-left: auto;margin-right: auto;display: block;width:130px"/></a>
                        Buscar por nombre:<br><b>ESTUDIO PALMERO</b><br>
                        <b>Coloca el importe elegido y tu DNI.</b>

 
                  ';
                  
                  
                 


                  $cuerpo .="
                  </td>
                  </tr>
                  <tr style='text-align:center'>
                  <td style='padding: 20px;'>
                  <br>
                  <hr style='margin-left:auto;margin-right:auto;display:block;width:50px;height:3px;background-color:grey;'>
                  <br>
                  <h2 style='text-align:center;font-family:verdana;color:grey;font-weight: 100;margin:0'>Estos son tus <b>datos personales</b> <br> </h2>
                  <br>
                  <b>Nombre y Apellido:</b> " . $nombre . "<br> 
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Telefono:</b> " . $telefono . "<br>
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

                   case 'HIPOTECARIO':
                  $cuerpo .= "
                  
                   <tr>
                      <td>
                      <img src='http://www.deudaonline.com.ar/imagenes/logo.png' style='width:300px;margin-left:auto;margin-right:auto;display:block'>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <h2 style='text-align:center;font-family:verdana;color:grey;font-weight: 100;'>ACTIVASTE TU ACUERDO DE PAGO CON <b>BANCO HIPOTECARIO</b> <br> ".strtoupper($pauta)."</h2>
                      </td>
                    </tr>
                  
                  
                  
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
                    <a class='fancybox'><img src='https://www.deudaonline.com.ar/imagenes/quiero_pagar/pmc.png' style='margin-left: auto;margin-right: auto;display: block;width:130px'/></a>
                        Buscar por nombre:<br><b>ESTUDIO PALMERO</b><br>
                        <b>Coloca el importe elegido y tu DNI.</b>
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
                  <hr style='margin-left:auto;margin-right:auto;display:block;width:50px;height:3px;background-color:grey;'>
                  <br>
                  <h2 style='text-align:center;font-family:verdana;color:grey;font-weight: 100;margin:0'>Estos son tus <b>datos personales</b> <br> </h2>
                  <br>
                  <b>Nombre y Apellido:</b> " . $nombre . "<br>
                  <b>DNI:</b> " . $dni . "<br>
                  <b>Telefono:</b> " . $telefono . "<br>
                  <b>Email:</b> " . $email . "<br>
                  <b>Acuerdo de pago:</b> " . $pauta . "<br><br />
                  ";

            
                 
                 
                  $cuerpo .= "
                  </td>
                  </tr>";

                  $cuerpo .="
                  <tr>
                    <td>
                      <div class='pago_10dias text-center center-block' style='width:100%;color: grey;font-size: 20px;
                      text-align: center;font-family:verdana'>
                      LO DEBES ABONAR EN LOS PROXIMOS 4 DIAS, SINO DEBEMOS ACTUALIZAR TU SALDO A PAGAR.
                    </div>
                    </td>
                  </tr>

                  ";

                

                  


                  $cuerpo .="
                  </table>";

                  break;
            
            
      }
      

      

      






      $mail->From = "info@c1250353.ferozo.com";
      $mail->FromName = "Deuda Online";
      $mail->Subject = "Confirmacion de acuerdo de deuda";
      $mail->AddAddress($email,"Deuda Online");
    $mail->AddAddress("mcd77.1990@gmail.com","Deuda Online");
   // $mail->AddAddress("rodrigo@legioncreativa.com","Deuda Online");

      $mail->Body = $cuerpo;
      $mail->AltBody = "";

     /* echo '
         
      ';*/



  
      $mail->Send();



       echo $resp2;
    
?>