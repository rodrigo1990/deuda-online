<?php include('header.php'); ?>
<?php
include("api2/clases/Acreedor.php");
?>
<style type="text/css">
.nombre_deudor{
	
	color:#1a9cd6;
	text-align:center;
	font-size:15px;
	font-weight:bold;	

}
.acuerdo{
	color:#404041;
	font-size:15px;
	font-weight:bold;
	
	
}
.leyenda_ts{
	font-size:14px;	
	margin-top:20px;
	color:#6d6e70;	
	
	
}
.pago_10dias{ background:#1a9cd6; color:#FFF; font-size:20px; border:1px solid #999; box-shadow:2px 2px 2px #666; padding:7px 5px; border-radius:5px; }
</style>

</<script type="text/javascript" src="<?php echo $base_url ?>js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo $base_url ?>js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>css/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
  $(document).ready(function() {
    $('.fancybox').fancybox();
  });
 function enviarDatosAcuerdo(){
	
	
	email=document.getElementById("email").value;
	telefono=document.getElementById("telefono").value;
	acree=document.getElementById("acree").value;
	pauta=document.getElementById("pauta").value;
	dni=document.getElementById("dni").value;
	nombre=document.getElementById("nombre").value;
	
	
	$.ajax({
				data:"email="+ email+"&telefono="+telefono+"&acree="+acree+"&pauta="+pauta+"&dni="+dni+"&nombre="+nombre,
				url:'enviarDatosAcuerdo.php',
				type:'get',
				success:function(response){					
					
					$("#formulario_acuerdo").html(response);
				}
				});

 }
</script>

<script language="JavaScript" type="text/javascript" src="<?php echo $base_url ?>formularios/tarjeta_american.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $base_url ?>formularios/tarjeta_master.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $base_url ?>formularios/tarjeta_visa.js"></script>

<div class="cabecera_160" id="c_quiero_pagar">
   QUIERO PAGAR
</div>
<br /><br />

<div class="container">
 <div class="col-sm-12">
    
    <div>
    <?php

$nombre=$_GET['nombre'];
$dni=$_GET['dni'];
$pauta=$_GET['pauta'];
$acree=$_GET['acree'];
$telefono=$_GET['tel'];
$email=$_GET['email'];

 require("class.phpmailer.php");
      $mail = new PHPMailer();
      $mail->Host = "localhost";
      $mail->IsHTML(true);
        
	  $cuerpo  = "Confirmación de acuerdo de pago: <br />";	
      $cuerpo .= "<b>Nombre y Apellido:</b> " . $nombre . "<br>";
      $cuerpo .= "<b>DNI:</b> " . $dni . "<br>";
      $cuerpo .= "<b>Teléfono:</b> " . $telefono . "<br>";
	  $cuerpo .= "<b>Acreedor:</b> " . $acree . "<br>";
      $cuerpo .= "<b>Acuerdo de pago:</b> " . $pauta . "<br>";
	
     
     
                      
      $mail->From = "info@c1250353.ferozo.com";
      $mail->FromName = "Deuda Online";
      $mail->Subject = "Confirmacion de acuerdo de deuda";
      $mail->AddAddress("elimperio@epb.com.ar","Deuda Online");
	 //$mail->AddAddress("rominacodarin@gmail.com","Deuda Online");
      $mail->Body = $cuerpo;
      $mail->AltBody = "";
      $mail->Send();


?>
	
    <div class="col-sm-12 nombre_deudor"><?php echo $nombre; ?></div>
     <div class="col-sm-12 text-center acuerdo"><strong>Acuerdo:<br/> <?php  echo $pauta; ?></strong></div>
      <div class="nombre_deudor text-center" style="padding-top:50px;">LA CONFIRMACIÓN DEL ACUERDO DE PAGO SE REALIZÓ CON ÉXITO</div>
       <!-- SI EL ACREEDER ES SANTANDER.. -->
      <?php if($_GET['acree']=='SANTANDER'){?>
       <br>
        <div class="pago_10dias text-center center-block" style="width:53%">EL PAGO DEBE REALIZARSE DENTRO DE LAS  PRÓXIMAS 72 HS <br> PARA DARLE VIGENCIA A LA OPCIÓN  ELEGIDA</div>

      <?php
      } ?>
      <?php
	  $pos = strpos($_GET['acree'], "TARSHOP");
	  if($pos===false){
		  
	  }else{
	  ?>
	  
	  <div class="col-sm-6 col-md-offset-3" style="text-align:center;">
      
       <a><img src="imagenes/quiero_pagar/7.png" alt="" /></a>
       <p class="leyenda_ts">Debe dirigirse a cualquier PAGO FÁCIL o RAPIPAGO.
Indicarle al cajero que hace un PAGO SIN FACTURA A LA ENTIDAD <strong>TARJETA SHOPPING saldo deudor con su nro de DNI.<br /><div class="pago_10dias">TIENE TIEMPO HASTA EL 29 DEL MES CORRIENTE PARA ABONAR</div></strong></strong></p>
      </div>
      
    
     
	<?php
	  }
	?>
      
      <div class="clear"></div><br /><br /><br />

    
      <span style="font-size:14px;">Ante cualquier duda consultá a un referente de Deuda Online al teléfono <b>011 7078-8500</b></span>

    </div>
    <div id="pr2_content">
      <div class="text-center" style="font-size: 16px; color:#404041; margin-bottom: 20px;"><b>CANCELÁ TU DEUDA SIGUIENDO ESTOS 3 SIMPLES PASOS:</b></div>
      <br />

      <div class="col-sm-4 text-center">
        <img src="imagenes/quiero_pagar/icon1.png" alt="" style="width: 100%; max-width: 100px;" /><br />
        Llamá a un referente de Deuda Online al teléfono 011 4510-6500<br /><br />
      </div>
      <div class="col-sm-4 text-center">
        <img src="imagenes/quiero_pagar/icon2.png" alt="" style="width: 100%; max-width: 100px;" /><br />
        Obtené las mejores ventajas económicas, acordando el mejor plan de pagos o cancelación en un único pago, de manera rápida, simple y transparente.<br /><br />
      </div>
      <div class="col-sm-4 text-center">
        <img src="imagenes/quiero_pagar/icon3.png" alt="" style="width: 100%; max-width: 100px;" /><br />
        Acudí al lugar de pago más cercano con tu número largo o código de barras.<br /><br />
      </div>
      <div class="clear"></div><br /><br />
      <div class="col-sm-12 text-center"><a href="contacto">Quiero conocer mi saldo</a></div>

      <br /><br />
    </div>

  </div>

</div>

<!-- POPUP -->
<div id="tarjeta_american" style="width:100%; max-width: 450px;display: none; padding: 20px;">
    <img src="imagenes/logos_pagos/7.jpg" alt="" /><br />
    <form name="tarjeta1"  id="hidden_form1" onsubmit="enviarDatosTarjeta1(); return false">
      <div class="titulos_popup_medio">AMERICAN EXPRESS</div>
      Por favor, dejá tus datos y Deuda Online se comunicará con vos a la brevedad para concretar el pago. Muchas gracias.<br /><br />
        Teléfono 1: <input class="campo_contactorapido" type="text" name="tel1" style="width: 320px; "/><br />
        Teléfono 2: <input class="campo_contactorapido" type="text" name="tel2" style="width: 320px; "/><br />
        Mail: <input class="campo_contactorapido" type="email" name="mail" style="width: 358px; "/><br />
        Nombre: <input class="campo_contactorapido" type="text" name="nombre" style="width: 332px; "/><br />
        Apellido: <input class="campo_contactorapido" type="text" name="apellido" style="width: 332px; "/><br />
        DNI: <input class="campo_contactorapido" type="text" name="dni" style="width: 358px; "/><br />
        <button class="contactorapido_btn" type="submit" name="submit">DEJAR DATOS</button>
      </form>
      <div id="resultadoTarjeta1" class="estilo_resultado"></div>
</div>
<div id="tarjeta_master" style="width:100%; max-width: 450px;display: none; padding: 20px;">
    <img src="imagenes/logos_pagos/8.jpg" alt="" /><br />
    <form name="tarjeta2" id="hidden_form2" onsubmit="enviarDatosTarjeta2(); return false">
      <div class="titulos_popup_medio">MASTERCARD</div>
      Por favor, dejá tus datos y Deuda Online se comunicará con vos a la brevedad para concretar el pago. Muchas gracias.<br /><br />
        Teléfono 1: <input class="campo_contactorapido" type="text" name="tel1" style="width: 320px; "/><br />
        Teléfono 2: <input class="campo_contactorapido" type="text" name="tel2" style="width: 320px; "/><br />
        Mail: <input class="campo_contactorapido" type="email" name="mail" style="width: 358px; "/><br />
        Nombre: <input class="campo_contactorapido" type="text" name="nombre" style="width: 332px; "/><br />
        Apellido: <input class="campo_contactorapido" type="text" name="apellido" style="width: 332px; "/><br />
        DNI: <input class="campo_contactorapido" type="text" name="dni" style="width: 358px; "/><br />
        <button class="contactorapido_btn" type="submit" name="submit">DEJAR DATOS</button>
      </form>
      <div id="resultadoTarjeta2" class="estilo_resultado"></div>
</div>
<div id="tarjeta_visa" style="width:100%; max-width: 450px;display: none; padding: 20px;">
    <img src="imagenes/logos_pagos/9.jpg" alt="" /><br />
    <form name="tarjeta3" id="hidden_form3" onsubmit="enviarDatosTarjeta3(); return false">
      <div class="titulos_popup_medio">VISA</div>
      Por favor, dejá tus datos y Deuda Online se comunicará con vos a la brevedad para concretar el pago. Muchas gracias.<br /><br />
        Teléfono 1: <input class="campo_contactorapido" type="text" name="tel1" style="width: 320px; "/><br />
        Teléfono 2: <input class="campo_contactorapido" type="text" name="tel2" style="width: 320px; "/><br />
        Mail: <input class="campo_contactorapido" type="email" name="mail" style="width: 358px; "/><br />
        Nombre: <input class="campo_contactorapido" type="text" name="nombre" style="width: 332px; "/><br />
        Apellido: <input class="campo_contactorapido" type="text" name="apellido" style="width: 332px; "/><br />
        DNI: <input class="campo_contactorapido" type="text" name="dni" style="width: 358px; "/><br />
        <button class="contactorapido_btn" type="submit" name="submit">DEJAR DATOS</button>
      </form>
      <div id="resultadoTarjeta3" class="estilo_resultado"></div>
</div>
<!-- FIN POPUP -->

<!-- POPUP -->
<div id="medio_111" class="popup_medio_pago">
  <img src="imagenes/logos_pagos/1.jpg" alt="" /><br />
  <div class="titulos_popup_medio">PAGO FÁCIL</div>
 <a href="generar_cupon.php?ac=<?php echo $acreedor->mostrarAcreedor() ?>&dni=<?php echo $acreedor->response->documento; ?>" style="text-align:center;">GENERAR CUPÓN DE PAGO<br/>CLICK AQUÍ</a>
</div>
<div id="medio_1" class="popup_medio_pago">
  <img src="imagenes/logos_pagos/1.jpg" alt="" /><br />
  <div class="titulos_popup_medio">PAGO FÁCIL</div>
  Debe dirigirse a cualquier PAGO FACIL (descartar Rapipago). <br>
  Indicarle al cajero que hace un PAGO SIN FACTURA A LA ENTIDAD <b>EPBCOM 2050 e indicar su NRO DE DNI.</b>
</div>
<div id="medio_2" class="popup_medio_pago">
  <img src="imagenes/logos_pagos/2.jpg" alt="" /><br />
  <div class="titulos_popup_medio">BANCO GALICIA</div>
  <span>Opción 1:</span><br />
  Deposito en Cuenta Corriente en Pesos nro.<br />
  4334-8068-3<br />
  2066-8068-9
  <br /><br />
  <span>Opción 2</span><br />
  Transferencia:  CBU nro.<br />
  00700689-20000004334839<br />
  00700689-20000002066891
  <br /><br />
  CUIT EPB&A: 33-68716473-9
</div>
<div id="medio_3" class="popup_medio_pago">
  <img src="imagenes/logos_pagos/3.jpg" alt="" /><br />
  <div class="titulos_popup_medio">BANCO SANTANDER RIO</div>
  <span>Opción 1:</span><br />
  Deposito: Cuenta Corriente en Pesos nro. 000-019178/8 <br />
  <span>Opción 2</span><br />
  Transferencia:  CBU nro. 07200007-20000001917886
  <br /><br />
  CUIT EPB&A: 33-68716473-9
</div>
<div id="medio_4" class="popup_medio_pago">
  <img src="imagenes/logos_pagos/4.jpg" alt="" /><br />
  <div class="titulos_popup_medio">BANCO HIPOTECARIO</div>
  <span>Opción 1:</span><br />
  Deposito: Cuenta Corriente en Pesos: 4-000-0001028735-2<br />
  <span>Opción 2</span><br />
  Transferencia: CBU: 04400004-40000102873528
  <br /><br />
  CUIT EPB&A: 33-68716473-9
</div>
<div id="medio_5" class="popup_medio_pago">
  <img src="imagenes/logos_pagos/5.jpg" alt="" /><br />
  <div class="titulos_popup_medio">MERCADOPAGO</div>
  - Ingrese en  https://www.mercadopago.com.ar (Consulte promociones de cuotas sin interés en https://www.mercadopago.com/mla/credit_card_promos.htm)<br />
  - En el marco superior derecho dirá "Regístrese" o "Ingrese". Opte por la segunda opción en caso de tener usuario de MERCADOPAGO o MERCADOLIBRE.<br />
  - Escriba su email/usuario y clave.<br />
  - En su cuenta, clickee la pestaña "Pagos"<br />
  - Seleccione "Enviar dinero a tus familiares y amigos"<br />
  - En la casilla de email, deberá ingresar mercadopago2@epb.com.ar<br />
  - Monto: $<br />
  - Motivo: Otra operación<br />
  - Mensaje: "DNI"<br />
  - Elija el medio de pago, complete los datos de la tarjeta, elija la cantidad de cuotas, y confirme el pago.
</div>
<div id="medio_6" class="popup_medio_pago">
  <img src="imagenes/logos_pagos/6.jpg" alt="" /><br />
  <div class="titulos_popup_medio">PERSONALMENTE (efectivo, débito o crédito)</div>
  En las oficinas de EPB&A (Reconquista 660, CABA) de lunes a viernes de 8 a 19 hs y sábados de 8 a 12 hs.
</div>
<!-- FIN POPUP -->

<script type="text/javascript">
  $(function()
  {

    $("#pr1").click(function() {
      $("#pr2_content").fadeOut();
      $("#pr1_content").delay(340).fadeIn();

      $("#pr1").css('background','#1a9cd6');
      $("#pr1").css('color','#ffffff');
      $("#pr2").css('background','#ffffff');
      $("#pr2").css('color','#1a9cd6');
    })

    $("#pr2").click(function() {
      $("#pr1_content").fadeOut();
      $("#pr2_content").delay(340).fadeIn();

      $("#pr2").css('background','#1a9cd6');
      $("#pr2").css('color','#ffffff');
      $("#pr1").css('background','#ffffff');
      $("#pr1").css('color','#1a9cd6');
    })
    
  });
</script>

<?php include('footer.php'); ?>