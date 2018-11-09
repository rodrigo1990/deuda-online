
<div class="col-sm-12"><span class="hf_tabla"><?php  echo $response->nombre; ?></span></div>

<div class="col-sm-12 text-center" style="font-size: 16px; color:#404041; margin-bottom: 20px;">
        <h4><b>Tenemos un descuento especial para vos por tu deuda con BANCO GALICIA, <br> dejanos tus datos para mayor información:</b></h4>
        <img src="../imagenes/logos_pagos/galicia-big.png" alt="Banco Galicia" class="center-block" width="200">
</div>


<form  style="text-align:center;" >
			
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

			<input type="hidden" value="<?php echo $documento ?>" name="documento" id="documento">
			<input type="hidden" value="<?php echo $response->nombre ?>" name="nombre" id="nombre">
			<input type="hidden" value="<?php echo $acreedor->mostrarAcreedor(0)?>" name="banco" id="banco">
			<br>

			<a  class="contactorapido_btn" onClick="enviarMailCuotas()" >ENVIAR</a>
			<!--  <input type="submit" class="contactorapido_btn" value="ENVIAR">-->
		</form>