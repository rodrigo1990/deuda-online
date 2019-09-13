<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php
	include("clases/Acreedor.php");
	require_once("../Clases/Api.php");
	include 'inc_consultar_datos.php';
	$url	= 'http://190.12.119.212:8106';//puerto 8106 -> API TEST
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
			
			<?php session_start(); ?>

			<?php $api = new Api(); ?>

			 
				
			<?php 
			$_SESSION['documento']= $documento;
			echo "<br>";
			//echo $response->idContacto;
			echo "<br>"
			//echo $_SESSION['idPlan'];


			 ?>
				
                <?php
				if(count($response->acreedores)==1){
					$i=0;
				?>
				<?php 
					echo '<pre>' , var_dump($response) , '</pre>';



			 	?>


				<?php if($acreedor->mostrarAcreedor(0)=="SUPERVIELLE"): ?>
					
					<?php include("inc/clientesSupervielle.php") ?>
					
					
				<?php else:  ?>

					<?php include("inc/clientesConPlanesDisponibles.php") ?>

				<?php endif; ?>
				<?php 
				}// fin del if es un solo acreedor
				?>
				
				
                
                <?php
				if(count($response->acreedores)>1){
				
				?>

				<div class="center-block paso-a-paso-cont"  style="">
		            <img src="../imagenes/quiero_pagar/paso-1.png" class="paso-a-paso">
		            <img src="../imagenes/quiero_pagar/paso-inactive-2.png" class="paso-a-paso" >
		            <img src="../imagenes/quiero_pagar/paso-inactive-3.png" class="paso-a-paso">
	        	</div>
				<div class="col-sm-12"><span class="hf_tabla"><?php  echo $response->nombre; ?></span></div>

				<div class="col-sm-12 text-center" style="font-size: 16px; color:#404041; margin-bottom: 20px;"><b>
                El detalle de su deuda<br />al día de la fecha es el siguiente: </b></div>
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
				    foreach($response->acreedores as $acree){  ?>
		                   

						<?php if($acreedor->mostrarAcreedor($i)=="SUPERVIELLE"): ?>
							
								<?php include("inc/clientesMultiplesSupervielle.php") ?>

		                <?php else: ?>

		                	<?php include("inc/clientesMultiplesConPlanesDisponibles.php") ?>
		                
		                <?php endif; ?>
                  <?php
				  
				  $i++;
				   }//for
				  ?>
                  
                </div>
                
                
                <?php
				}// fin if mas de un acreedor
				?>
                
        
		</div>
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
				<script type="text/javascript" src="js/mailCantidadCuotas.js"></script>

		 
	</body>
</html>

