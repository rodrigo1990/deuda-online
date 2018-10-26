<?php include("head.php") ?>
<?php

include("api2/clases/Acreedor.php");
$response=unserialize($_POST['response']);
$acreedor=new Acreedor($response);
//echo $_POST['dni'].'<br>';
$acreedor->mostrarAcreedor($_POST['posicion']);
$partes=explode(" ", $_POST['pauta']);
$monto_a_pagar=$partes[4]*1;
?>

<div class="main">
  <?php include('header.php'); ?>


  <div class="cabecera_160" id="c_quiero_pagar">
     QUIERO PAGAR
  </div>
  <br /><br />

  <div class="container">
   <div class="col-sm-12 mostrar-acep-cont">
      
      <div>

              <div class="center-block paso-a-paso-cont"  style="">
                <img src="imagenes/quiero_pagar/paso-inactive-1.png" class="paso-a-paso" style='float:left;margin-left:0px !important'>
                <img src="imagenes/quiero_pagar/paso-2.png" id="paso-2" class="paso-a-paso" style=''>
                <img src="imagenes/quiero_pagar/paso-inactive-3.png" id="paso-3" class="paso-a-paso" style=''>
            </div>   
           
      <div class="col-sm-12 nombre_deudor"><?php ?></div>
        <div class="titulos_pagar">MÉTODOS DE PAGO</div>
        
        <div class="col-sm-6 text-center ">
        
       <div class="nombre_deudor">
         <h2>
           <?php echo utf8_encode($response->nombre); ?>
         </h2>
       </div>


      <h2><strong>Seleccionó el acuerdo: <br/><?php echo $_POST['pauta']?></strong></h2>

        
    
        
        </div><!-- fin col 6 forma de pago-->
        <div class="col-sm-6">
        	<p><strong id='form-msj'>Complete los siguientes datos para recibir por </strong> <form id="formulario_acuerdo"> 
          
          
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" >
              
              <div id="email-error" class="form-error">Ingrese un email valido</div>
           
            </div>
            
            <div class="form-group">
                
              <label for="telefono">Teléfono</label>
              <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" >
              
              <div id="tel-error" class="form-error">Ingrese un numero de telefono valido sin guiones ni espacios</div>
              
              
              <input type="hidden" name="acree" id="acree" value="<?php echo $acreedor->mostrarAcreedor($_POST['posicion']); ?>" />
              <input type="hidden" id="pauta" name="pauta" value="<?php  echo $_POST['pauta']; ?>" />
              <input type="hidden" name="dni" id="dni" value="<?php echo $acreedor->response->documento; ?>" />
              <input type="hidden" name="nombre" id="nombre" value="<?php echo $acreedor->response->nombre; ?>" />  
             </div>         
            
            <div  class="btn btn-primary" onClick="enviarDatosAcuerdo()">Enviar Datos de Acuerdo</div>
          </form>
        </div>
        <div class="clear"></div><br />
        <div class="clear"></div><br />

      
        <span style="font-size:14px;">
          <p class="p-footer">
            Ante cualquier duda consultá a un referente de Deuda Online al teléfono <a id="click2call_callbtn" class="pointer green a-footer"><i class="fas fa-phone"></i> <b>011 7078-8512</a></b>
          </p>
          <p class="p-footer">
            O envianos un WhatsApp a <a href="https://api.whatsapp.com/send?phone=541126531118&text=¡Hola!%20Queria%20hacer%20una%20consulta%20acerca%20de%20los%20servicios%20brindados%20en%20www.deudaonline.com.ar"target="_blank" class="green a-footer"><i class="fab fa-whatsapp fa-lg"></i> <b>+54 9 11 2653 1118</b></a>
          </p>
        </span>


        <div id="click2call" align="center">
          
          
           
          
          <div id="click2call_msgdiv"></div>
           
          <div style="visibility: hidden; display: none;">
            <input id="click2call_user" value="982">
            <input id="click2call_domain" value="argen.grancentral.com.ar">
            <input id="click2call_password" value="982@2e05">
            <input id="click2call_number" value="500">
            <input id="click2call_host" value="wss://webrtc.anura.com.ar:9084">
          </div>
           
          <div id="media" style="visibility: hidden; display: none;">
            <video width=800 id="webcam" autoplay="autoplay" hidden="true"></video>
          </div>
        </div>

  <div class="clear"></div><br />
      </div>

      <div id = "myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>El e-mail con el acuerdo de pago se envio correctamente.<br />Ingrese a su cuenta de email para confirmar el acuerdo</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">¡ENTENDIDO!</button>
        </div>
      </div>
    </div>
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
  <?php include('ayuda-xs.php'); ?>

  <!-- POPUP -->
  <div id="medio_111" class="popup_medio_pago">
    <img src="imagenes/logos_pagos/1.jpg" alt="" /><br />
    <div class="titulos_popup_medio">PAGO FÁCIL</div>
   <a target="_blank" href="generar_cupon.php?ac=<?php echo $acreedor->mostrarAcreedor($_POST['posicion']); ?>&dni=<?php echo $acreedor->response->documento; ?>" style="text-align:center;">GENERAR CUPÓN DE PAGO<br/>CLICK AQUÍ</a>
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



  <div class="callBkground">
      <a id="click2call_hupbtn" class="pointer">
            <img src="https://webrtc.anura.com.ar/click2call/img/phone_hang.png" class="picar">
      </a>

  </div>
</div>


<!-- FIN POPUP -->
<?php include('footer.php'); ?>


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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</<script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="css/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
  $(document).ready(function() {
    $('.fancybox').fancybox();
  });
 function enviarDatosAcuerdo(){
     
  	var emailValido=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  	var soloNumeros=/^[0-9]*$/;

  
  email=document.getElementById("email").value;
  telefono=document.getElementById("telefono").value;
  acree=document.getElementById("acree").value;
  pauta=document.getElementById("pauta").value;
  dni=document.getElementById("dni").value;
  nombre=document.getElementById("nombre").value;
  
      if(email.length==0 || email.search(emailValido)){
          $("#tel-error").fadeOut();
      $("#email-error").fadeIn();
      }else if(telefono.length>13 || telefono.length==0 || telefono.search(soloNumeros)){
      $("#email-error").fadeOut();
      $("#tel-error").fadeIn();
      }else{
      
          $.ajax({
                data:"email="+ email+"&telefono="+telefono+"&acree="+acree+"&pauta="+pauta+"&dni="+dni+"&nombre="+nombre,
                url:'enviarDatosAcuerdo.php',
                type:'get',
                success:function(response){         
                  
                  $('#myModal').modal('show');
                  $("#paso-2").attr('src','imagenes/quiero_pagar/paso-inactive-2.png');
                  $("#paso-3").attr('src','imagenes/quiero_pagar/paso-3.png');
                  $("#form-msj").hide();
                  $("#formulario_acuerdo").html(response);
                }
                });
    }

 }
</script>

<script language="JavaScript" type="text/javascript" src="<?php echo $base_url ?>formularios/tarjeta_american.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $base_url ?>formularios/tarjeta_master.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $base_url ?>formularios/tarjeta_visa.js"></script>
<script language="JavaScript" type="text/javascript" src="js/mostrarAyudaModal.js"></script>
<script type="text/javascript" 
    src="https://webrtc.anura.com.ar/click2call/js/jquery.json-2.4.min.js">
</script>
<script type="text/javascript" 
    src="https://webrtc.anura.com.ar/click2call/js/jquery.cookie.js">
</script>
<script type="text/javascript" 
    src="js/verto-min.js">
</script>
<script type="text/javascript" 
    src="js/click2call.js">
</script>
