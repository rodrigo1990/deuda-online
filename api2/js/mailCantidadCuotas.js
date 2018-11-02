 function enviarMailCuotas(){

	$( "body" ).prepend( '<div id="preloader"><div class="spinner-sm spinner-sm-1" id="status"> </div><h2 style="color: #1a9cd6;font-style: italic;" class="text-center">Estamos procesando<br>su consulta</h2></div>' );
	
	

	var cuotas = $("#cant-cuotas").val();
	var nombre = $("#nombre").val();
	var documento = $("#documento").val();
	var banco = $("#banco").val();

	$.ajax({
			data:{cuotas:cuotas,nombre:nombre,documento:documento,banco:banco},

			url:'ajax/mailCantidadCuotas.php',

			type:'POST',

			success:function(response){

				$("#preloader").html("<h1>Solicitud enviada</h1>");
				alert(response);

			}
	});
}



