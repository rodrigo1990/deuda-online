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
		
		<form action="">
			<label for="">¿Cuantas cuotas desea solicitar?</label>
			<input type="number">
			
			<input type="hidden">
		</form>
		
		

	    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
		<script src="js/bootstrap.js"></script>
		 
	</body>
</html>

