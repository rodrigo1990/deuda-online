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
		<form >
			<h2>Enviaremos un email con sus datos y su peticion de cuotas adicionales</h2>
			<label for="cant-cuotas" class="">¿Cuantas cuotas desea?</label>

			<input type="number" min="7" name="cant-cuotas" id="cant-cuotas" class="form-control center-block">

			<input type="hidden" value="<?php echo $_GET['documento'] ?>" name="documento" id="documento">
			<input type="hidden" value="<?php echo $_GET['nombre'] ?>" name="nombre" id="nombre">
			<input type="hidden" value="<?php echo $_GET['banco'] ?>" name="banco" id="banco">
			<br>

			<a  class="contactorapido_btn" onClick="enviarMailCuotas()" >ENVIAR</a>
			<!--  <input type="submit" class="contactorapido_btn" value="ENVIAR">-->
		</form>
		
		
        <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/mailCantidadCuotas.js"></script>
		 
	</body>
</html>

