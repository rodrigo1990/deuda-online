<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		
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
			
			<label for="email" class="">Ingrese su email</label>
			
			<input type="email" name="email" id="email" class="form-control center-block cuotas-input" >
			
			<div class="form-error" id="email-error">Ingrese un email valido</div>
			
			<label for="telefono" class="">Ingrese su numero de telefono</label>
			
			<input type="text"  name="telefono" id="telefono" class="form-control center-block cuotas-input" >
			
			<div class="form-error" id="telefono-error">Ingrese un telefono valido</div>
			
			<label for="mensaje" class="">Dejanos un comentario que nos ayude a confeccionar el plan</label>
			<input type="text" name="mensaje" id="mensaje" class="form-control center-block cuotas-input" >
			<div class="form-error" id="mensaje-error">Ingrese un comentario</div>


			<label for="franja-horaria" class="">¿En que franja horario podemos comunicarnos?</label>
			<select name="franja-horaria" id="franja-horaria" class="form-control center-block cuotas-input text-center">
				<option value="0">Seleccione una franja horaria</option>
				<option value="08:00 a 12:00 HS">08:00 a 12:00 HS</option>
				<option value="12:00 a 16:00 HS">12:00 a 16:00 HS</option>
				<option value="16:00  a 20:00 HS">16:00  a 20:00 HS</option>
			</select>
			<div class="form-error" id="franja-horaria-error">Ingrese una franja horaria</div>

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

