<?php include('header.php'); ?>

<script language="JavaScript" type="text/javascript" src="<?php echo $base_url ?>formularios/form_contacto.js"></script>

<div class="cabecera_160" id="c_contacto">
  CONTACTO
</div>
<br /><br />

<div class="container">
  <div class="col-sm-6 col-sm-offset-3 text-left" style="font-size: 16px; color:#404041; margin-bottom: 20px;"><b>Completá con tus datos:</b></div>
  <div class="col-sm-6 col-sm-offset-3">

    <form name="form_contacto" onsubmit="enviarDatosForm_Contacto(); return false">
      <input class="campo_contacto" type="text" name="nombre" placeholder="Nombre y Apellido:" required /><br />
      <input class="campo_contacto" type="text" name="dni" placeholder="DNI:" required /><br />
      <input class="campo_contacto" type="text" name="motivo" placeholder="Motivo de consulta:" required /><br />
      <select class="campo_contacto" name="medio_contacto">
        <option>¿Cómo desea ser contactado?</option>
        <option>Mail</option>
        <option>Teléfono</option>
        <option>Whatsapp</option>
      </select><br />
      <input class="campo_contacto" type="email" name="mail" placeholder="Mail:" required /><br />
      <input class="campo_contacto" type="text" name="cel" placeholder="Celular:" required /><br />

      <button class="contactorapido_btn" type="submit" name="submit">ENVIAR</button>
    </form>
    <div id="resultadoFormContacto" class="estilo_resultado"></div>

    <?php
    /*
    if($_POST['nombre'])
    {
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
      $cuerpo .= "<b>N de cuenta:</b> " . $cuenta . "<br>";
      $cuerpo .= "<b>Mail:</b> " . $mail . "<br>";
      $cuerpo .= "<b>Cel:</b> " . $cel . "<br>";
                      
      $mail->From = "info@legionvps.com";
      $mail->FromName = "Deuda Online";
      $mail->Subject = "Formulario de Contacto";
      $mail->AddAddress("dmd.nnn@gmail.com","Deuda Online");
      $mail->Body = $cuerpo;
      $mail->AltBody = "";
      $mail->Send();
    
      ?><div style="color:green; font-weight: 700;"><?php echo "Formulario enviado correctamente."; ?></div><?php
    }
    */
    ?>
  </div>
  <div class="clear"></div><br />
</div>

<?php include('footer.php'); ?>