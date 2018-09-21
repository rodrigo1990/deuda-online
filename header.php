<?php
//error_reporting(0);
//include('panel/conexion.php');
//include('panel/includes/acentos.php');

$url_actual = basename($_SERVER['SCRIPT_NAME']);
$url_actual = str_replace('.php', '', $url_actual);
$base_url = "http://localhost/gitrepo/deuda-online/";
//$base_url = "http://www.deudaonline.com.ar/";
?>

<!DOCTYPE html>
<html lang="ES">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deuda Online</title>
    <meta name="Keywords" content="">
    <meta name="Description" content=""/>

    <link rel="icon" type="image/png" href="imagenes/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="imagenes/favicon-16x16.png" sizes="16x16" />

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/queries.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="https://s3.amazonaws.com/menumaker/menumaker.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/menu.js"></script>
    <!-- Código de instalación Cliengo para  www.deudaonline.com.ar/index/ -->
<script type="text/javascript">(function(){var ldk=document.createElement('script');ldk.type='text/javascript';ldk.async=true;ldk.src='https://s.cliengo.com/weboptimizer/5ab2de19e4b0b795c557873c/5ac3e72be4b09ccb2aaa44a5.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ldk, s);})();</script>
    <link rel="stylesheet" href="<?php echo $base_url ?>css/menu.css">
  </head>
  
  <body>
    <header>
      <div class="container">
        <div class="col-sm-4 text_center_mobile">
          <a href="<?php echo $base_url ?>index"><img src="<?php echo $base_url ?>imagenes/logo.png" alt="Deuda Online" id="logo" /></a>
        </div>
        <div class="col-sm-8">
          <div id="cssmenu" style="position: relative; z-index:999;">
            <ul>
               <li <?php if($url_actual == "deuda_online") { ?>class="current"<?php } ?>><a href="<?php echo $base_url ?>deuda_online">QUE ES DEUDA ONLINE</a></li>
               <li <?php if($url_actual == "preguntas_frecuentes") { ?>class="current"<?php } ?>><a href="<?php echo $base_url ?>preguntas_frecuentes">PREGUNTAS FRECUENTES</a></li>
               <li <?php if($url_actual == "quiero_pagar") { ?>class="current"<?php } ?>><a href="<?php echo $base_url ?>quiero_pagar">QUIERO PAGAR</a></li>
               <li <?php if($url_actual == "contacto") { ?>class="current"<?php } ?>><a href="<?php echo $base_url ?>contacto">CONTACTO</a></li>
            </ul>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </header>
<div class="clear"></div>