<?php 

$total = $_GET['total'];
$nombre = $_GET['nombre'];
$documento = $_GET['dni'];
$cuil = $_GET['cuil'];
$cartera = $_GET['cartera'];

if($cartera != 'campaña'){

		$operacion2 = $total - ($total/1.1210);
		$operacion1 = $total/1.1210;
} else{

	$operacion1 = $total;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<!-- CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/queries.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
	<section class="border">
		<div class="row text-center header">
			<div class="container">
				<img src="img/santander-logo.png" alt="">
				<h1>Instrucción de pago SICE</h1>
				<h2>Sr/a <?php echo ucfirst($nombre) ?></h2>
			</div>
		</div>
		
			<div class="row text-center">
				<div class="container">
					<p>Por favor diriajse a una sucursal del <b>Banco Santander Río</b> dentro del <br> horario bancario por ventanilla (NO terminal ni cajero automatico) a realizar el deposito en <b>EFECTIVO</b> acordado por: </p>
					<h1 class="total"><?php echo "$".number_format($total, 2, ',', '.'); ?></h1>
				</div>
			</div>
		<section class="body">
			<div class="row text-center">
				<div class="container">
					<p>El cual debe abonar de al siguiente forma: <br> Dele la presente instrucción al cajero/a para que realice las dos operaciones detalladas</p>
				</div>
			</div>
			
			
			<div class="row text-center operaciones">
				<div class="container">
					<div class="col-sm-6 col-lg-6 col-md-6 col-xs-6 bk">
						<h2>OPERACIÓN 1</h2>
						<h2 class="center-block"><?php echo "$".number_format($operacion1, 2, ',', '.') ?></h2>
					</div>

					<?php if(isset($operacion2)): ?>
							<div class="col-sm-6 col-lg-6 col-md-6 col-xs-6 bk">
								<h2>OPERACIÓN 2</h2>
								<h2 class="center-block"><?php echo "$".number_format($operacion2, 2, ',', '.') ?></h2>
							</div>
					<?php endif; ?>
				</div>
			</div>


			<div class="row text-center descrip-operaciones">
				<div class="container">
					<div class="col-sm-6 col-lg-6 col-md-6 col-xs-6 bk">
						<p>
							Sellstation - Piryp
							<br>
							Consulta y cobro de recaudacion SICE NUP 831615 Est. Palmero de Belizan 
							<br>
							CUIT DEL BANCO 305000084540
							<br>
							Número de acuerdo (acorde a la moneda de la deuda), pesos:03 y dolares:04
							<br>
							Número de CUIT cliente: <?php echo $cuil ?>
						</p>
					</div>
					<div class="col-sm-6 col-lg-6 col-md-6 col-xs-6 bk">
						<p>Sellstation - Piryp
							<br>
						Consulta y cobro de recaudacion SICE
						<br>
						Estudio Palmero de Belizan
						<br>
						CUIT DE EPB: 33-68716473-9
						<br>
						Número de acuerdo (acorde a la moneda de la deuda),pesos:03 y dolares:04
						<br>
						Número de CUIT cliente: <?php echo $cuil ?></p>
					</div>
				</div>
			</div>
		</section>
		<section class="footer">
			<div class="row text-center">
				<div class="container">
					<p><b>ESTIMADO CAJERO</b> recuerde que debe tomarle las dos operaciones en forma conjunta</p>
					<p>Ante cualquier duda comunicarse con la Gerencia de Recuperaciones.</p>
					<p><b>ESTIMADO CLIENTE</b> no se retire de la caja sin los dos comporbantes de deposito que sumen el total detallado mas arriba. Sin ellos no se dara por valida la cancelacion de la deuda</p>
					<p>Una vez realizados los mismos enviar los comprobantes por whatsapp al (011) 15-2653-1118 para acelerar el proceso</p>
					<br>
					<br>
					<a onClick="window.print()" class="print-btn"><i class="fas fa-print"></i> IMPRIMIR/PDF</a>
				</div>
			</div>
		</section>
	</section>



	

	
</body>
</html>