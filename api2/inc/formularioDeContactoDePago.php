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
			<input type="hidden" value="<?php echo $acreedor->mostrarAcreedor($i)?>" name="banco" id="banco">
			

			<input type="hidden" name="idContacto" id="idContacto" value="<?php echo $response->idContacto ?>">
			
			<input type="hidden" name="queryId" id="queryId" value="<?php echo $response->queryId ?>">
			<br>

			<a  class="contactorapido_btn" onClick="enviarMailCuotas()" >ENVIAR</a>
			<!--  <input type="submit" class="contactorapido_btn" value="ENVIAR">-->
		</form>