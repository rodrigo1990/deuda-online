<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php
	include("clases/Acreedor.php");
	include 'inc_consultar_datos.php';
	$url	= 'http://190.111.231.172:8099';
	$user	= 'lcreativa';
	$pwd	= 'p4lm3r0_2016';
	

	$response = null;
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$documento 	= isset($_POST['documento']) ? htmlentities(trim(strval($_POST['documento']))) : '';
		$_SESSION['documento']=$documento;
		$telefono 	= isset($_POST['telefono']) ? htmlentities(trim(strval($_POST['telefono']))) : '';
		$mail 		= isset($_POST['mail']) ? htmlentities(trim(strval($_POST['mail']))) : '';
		$culture 	= isset($_POST['culture']) ? htmlentities(trim(strval($_POST['culture']))) : '';
		if($documento) {
			$response 	= httpConsultarDocumento($url, $user, $pwd, $documento, $telefono, $mail, $culture);
			$acreedor=new Acreedor($response);
		}
	}
	
	/*
	$documentoUsuario 	= '10061484';
	
	print_r($response);*/
?>

<style type="text/css">
body
{
  font-family: 'Open Sans', sans-serif;
  font-size: 13px;
  color: #6d6e70;
  background: #ffffff;
}

.contactorapido_btn
{
  margin-top: 20px;
  background: #1a9cd6;
  color: #ffffff;
  border: 0px;
  padding: 5px 15px;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
}

a:hover
{
  text-decoration: none;
  color: #ffffff;
}
.hf_tabla {
    color: #1a9cd6;
    text-align: center;
    padding-bottom: 5px;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: bold;
    padding-top: 5px;
}
.div_33{ width:33%; float:left; text-align:center; color:#333; font-size:13px; font-weight:bold; padding-bottom:5px;}
.div_33b{ width:33%; float:left; text-align:center; color:#1a9cd6; font-size:13px; font-weight:bold; padding-bottom:5px;}
.contactorapido_btn {
    float: none !important; 
 
}
</style>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Deuda Online</title>
	    <meta name="Keywords" content="">
	    <meta name="Description" content=""/>

		<link href="../css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="../css/styles.css">
	    <link rel="stylesheet" href="../css/queries.css">
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
	</head>
	<body style="text-align:center;">
		<?php
		if($_SERVER['REQUEST_METHOD'] != 'POST') { ?>
		<div class="col-sm-12 text-center" style="font-size: 16px; color:#404041; margin-bottom: 20px;"><b>Ingrese su número de DNI<br />para conocer el saldo de su deuda</b></div>
		<form action="index.php" method="post">
			<input type="text" name="documento" required style="border: 0px; border-bottom: 3px solid #1a9cd6; width: 100%; max-width: 480px;" /><br />
			<!-- <input type="text" name="telefono" placeholder="Telefono" value="" /> -->
			<!-- <input type="text" name="mail" placeholder="Email" value="" /> -->
			<!-- <input type="text" name="culture" placeholder="Culture" value=""  /> -->
			<input type="submit" name="submit" value="ACEPTAR" class="contactorapido_btn" />
		</form>
		<?php } ?>
		
		<?php
			if($response && $response->status != 'OK') {
				 echo '<h1 style="color: red">'.$response->status.'</h1>';
			}
			if($response && $response->status == 'OK') :		?> 
	            <img src="../imagenes/quiero_pagar/pasoApaso2.png" class="paso-a-paso center-block" style='width:800px;padding-bottom:30px'>
	            <img src="../imagenes/quiero_pagar/pasoApaso3.png" class="paso-a-paso center-block" style='width:800px;padding-bottom:30px'>
	            <img src="../imagenes/quiero_pagar/pasoApaso5.png" class="paso-a-paso center-block" style='width:800px;padding-bottom:30px'>         
            	<div class="col-sm-12"><span class="hf_tabla"><?php  echo $response->nombre; ?></span></div>
				<div class="col-sm-12 text-center" style="font-size: 16px; color:#404041; margin-bottom: 20px;"><b>
                El detalle de su deuda<br />al día de la fecha es el siguiente: </b></div>
				
                <?php
				if(count($response->acreedores)==1){
				?>
				<table style="width: 100%; max-width: 700px; margin: auto; margin-bottom:30px; font-weight: 400;  text-align:center;">
					<thead style="border-bottom: 1px solid #1a9cd6; height: 50px;">
						<tr>
							<th style="color: #1a9cd6; text-align:center; padding-bottom: 5px; text-transform: uppercase; font-size: 13px;">Producto</th>
							<th style="color: #1a9cd6; text-align:center; padding-bottom: 5px; text-transform: uppercase; font-size: 13px;">Acreedor</th>
							<th style="color: #1a9cd6; text-align:center; padding-bottom: 5px; text-transform: uppercase; font-size: 13px;">USTED DEBE</th>
						
						
						</tr>
					</thead>
					<tbody>
						<?php foreach($response->acreedores as $acree) :  ?>
                        	
							<?php
							
								foreach($acree->productos as $producto){ 
								$fecha_deuda =time();
								$fecha_deuda = substr($fecha_deuda, 0, 10);

								$dia_deuda = substr($fecha_deuda, 0, 2);
								$mes_deuda = substr($fecha_deuda, 3, 2);
								$anio_deuda = substr($fecha_deuda, 6, 4);

								$fecha_rev = $anio_deuda . '-' . $mes_deuda . '-' . $dia_deuda;

								$now = time();
								$your_date = strtotime($fecha_rev);
								$datediff = $now - $your_date;
								$cant_dias = floor($datediff / (60 * 60 * 24));

								$saldo = $producto->saldo;

								$mora = ($cant_dias * 9)/100;
								$adicional = ($saldo * $mora)/100;

								$total = round($saldo + $adicional);

								$cuota_1 = round($saldo);
								$cuota_2 = round((($total * 25)/100 + $total) / 2);
								$cuota_3 = round($total / 3);

								if($producto->nombre == "TJ")
								{
									$producto_nombre = "Tarjeta de Crédito";
								}
								elseif($producto->nombre == "PR")
								{
									$producto_nombre = "Préstamo Personal";
								}
								elseif($producto->nombre == "CC")
								{
									$producto_nombre = "Cuenta corriente";
								}
								else
								{
									$producto_nombre = $producto->nombre;
								}
							?>
							<tr style="border-bottom: 1px solid #6d6e70; font-size: 13px; height: 30px; text-align:center;">
								<th style="text-align:center;"><?php echo $producto_nombre; ?></th>
								<th style="text-align:center;"><?php  echo $acree->nombre." ".$acree->grupo; ?></th>

								<?php $honorario =  str_replace(',','.',$acreedor->obtenerPauta(0))  ?>


								<th style="text-align:center;">$<?php echo round(str_replace(',','.',$producto->saldo*$honorario),2); ?></th>
							
							
							</tr>
                            <?php
								}
							?>
						<?php endforeach; ?>
                        <tr>
                        	<td style="text-align:center; font-weight:bold; font-size: 13px; height: 30px; color:#1a9cd6">TOTAL</td>
                            <td></td>
                          


                        	<?php $honorario =  str_replace(',','.',$acreedor->obtenerPauta(0))  ?>



                        	<td style="text-align:center; font-weight:bold;font-size: 13px; height: 30px; color:#1a9cd6">$<?php if($acree->saldo*$honorario!=0){ echo number_format($acree->saldo*$honorario*1, 2, ',', '.');} ?></td>

                          

                        </tr>
					</tbody>
				</table>
                <?php
				
				
				$acreedor->mostrarPautas(0);
				
				
				}// fin del if es un solo acreedor
				?>
                
                <?php
				if(count($response->acreedores)>1){
				
				?>
                <div style="margin:0 auto; width:100%; max-width:700px;">
                
                
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default" style="margin-bottom:0px; border:0; ">
                   <div class="row"> <div class="div_33b">
                         	ACREEDOR
                          </div>
                          <div class="div_33b">
                         	SALDO
                          </div>
                          <div class="div_33b">
                         DETALLE
                          </div>
                          </div>
                   
                   <?php
				   $i=0;
				  // var_dump($response->acreedores);
				    foreach($response->acreedores as $acree){  ?>
                   
                    <div class="panel-heading" role="tab" id="headingOne" style="background:none; border:0; border-bottom:1px solid #1a9cd6; border-color:none; ">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne" style="height:20px;">
                        <div class="row"> <div class="div_33">
                         	<?php  echo $acree->nombre.' '.$acree->grupo; ?>
                          </div>
                          <div class="div_33">

							<?php $honorario =  str_replace(',','.',$acreedor->obtenerPauta($i))  ?>
                         	$<?php if($acree->saldo!=0){ echo number_format($acree->saldo*$honorario, 2, ',', '.');} ?>

                         
								
							

                          </div>
                          <div class="div_33">
                         	<span class="contactorapido_btn">DETALLE</span>
                          </div>
                          </div>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
                      <div class="panel-body">
                       <?php
						$acreedor->mostrarPautas($i);
					   ?>
                      </div>
                    </div>
                  </div>
                  <?php
				  
				  $i++;
				   }
				  ?>
                  
                </div>
                
                
                <?php
				}// fin if mas de un acreedor
				?>
                
                
                
                
		<?php endif; ?><!-- termina status ok -->

		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {  ?>
			<br /><br />
            <!--
			<a class="contactorapido_btn" target="_parent" href="http://deudaonline.com.ar/metodos_pago">QUIERO PAGAR</a>
            
            <a class="contactorapido_btn" target="_parent" href="../metodos_pago.php">QUIERO PAGAR</a>-->
		<?php }  ?>
        
        <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>

