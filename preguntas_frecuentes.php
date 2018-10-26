<?php include('head.php'); ?>
<?php include('header.php'); ?>

<div class="cabecera_160" id="c_preguntas">
   PREGUNTAS FRECUENTES
</div>
<br /><br />

<div class="container">

  <div class="col-sm-6">
    <div class="pregunta" id="pr1">¿POR QUÉ DEJAR DE SER DEUDOR?</div>
  </div>
  <div class="col-sm-6">
    <div class="pregunta" id="pr2">¿CÓMO SE COMPONE UNA DEUDA ACTUALIZADA?</div>
  </div>
  <div class="clear"></div><br /><br />

  <div class="col-sm-12">
    
    <div id="pr1_content">
      <div class="titulos_pr_content"><i class="fa fa-chevron-right" aria-hidden="true"></i> ¿POR QUÉ DEJAR DE SER DEUDOR?</div>
      La mora financiera ocasiona pérdida del crédito personal, intimaciones permanentes y problemas jurídicos. A veces, determinadas situaciones pueden conducirnos al incumplimiento aunque tengamos el deseo de pagar. Por eso creamos Deuda Online: porque sabemos que cancelar deudas es más fácil que nunca y porque creemos que estar al día con los pagos es apostar por una mejor calidad de vida. 
      <br /><br />
    </div>
    <div id="pr2_content">
      <div class="titulos_pr_content"><i class="fa fa-chevron-right" aria-hidden="true"></i> ¿CÓMO SE COMPONE UNA DEUDA ACTUALIZADA?</div>
      A la deuda inicial se le suma: 
      <br /><br />
      El interés compensatorio "compensa" al acreedor por el tiempo en que éste "cede" su dinero al deudor. Este interés sólo se debe si se ha pactado previamente, con excepción de los "compensatorios legales" (Artículos 466, 1950 y 2298 del Código Civil) y sólo es aplicable a la obligación contractual, a diferencia del Moratorio que es aplicable a todas las obligaciones.
      <br /><br />
      Es el interés que se produce ante la falta de pago del capital en la fecha estipulada. En este caso el Acreedor (prestamista) tiene derecho "a penar" al deudor por no haberle abonado en término. Estos intereses aplican una tasa mayor que los intereses compensatorios. Es decir, es el interés causado por incumplimiento de la obligación pactada.
      <br /><br />
    </div>

  </div>

</div>

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