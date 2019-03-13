 function enviarMailCuotas(){
     
    var mensaje = $("#mensaje").val();
	var nombre = $("#nombre").val();
	var documento = $("#documento").val();
	var banco = $("#banco").val();
	var telefono = $("#telefono").val();
	var email = $("#email").val();
	var franjaHoraria = $("#franja-horaria").val();
	var emailValido=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  var soloNumeros=/^[0-9]*$/;
	var idContacto = $("#idContacto").val();
	var queryId = $("#queryId").val();
	
	
	if(email.length==0 || email.search(emailValido)){
	    $("#email-error").fadeIn();
	}else if(telefono.length>13 || telefono.length==0 || telefono.search(soloNumeros)){
	    $("#email-error").fadeOut();
	    $("#telefono-error").fadeIn();
	}else if(mensaje.length==0){
	    $("#telefono-error").fadeOut();
	    $("#mensaje-error").fadeIn();
	}else if(franjaHoraria==0){
		$("#mensaje-error").fadeOut();
	    $("#franja-horaria-error").fadeIn();

	}else{
        $("#email-error").fadeOut();
        $("#telefono-error").fadeOut();
        $("#mensaje-error").fadeOut();
    
        
    	$( "body" ).prepend( '<div id="preloader"><div class="spinner-sm spinner-sm-1" id="status"> </div><h2 style="color: #1a9cd6;font-style: italic;" class="text-center">Estamos procesando<br>su consulta</h2></div>' );
    	
    	
    
    	
    
    	$.ajax({
    			data:{mensaje:mensaje,nombre:nombre,documento:documento,banco:banco,telefono:telefono,email:email,franjaHoraria:franjaHoraria},
    
    			url:'ajax/mailCantidadCuotas.php',
    
    			type:'POST',
    
    			success:function(response){
    
					//alert(response);
					
					console.log("almacenando actividad...");


					
					$.ajax({
						data:{documento:documento,idContacto:idContacto,queryId:queryId,banco:banco,telefono:telefono,email:email},
			
						url:'ajax/crearPlanYModificarActividad.php',
			
						type:'POST',
			
						success:function(idPlan){
	
							console.log(idPlan);


							$.ajax({
								data:{documento:documento,idContacto:idContacto,queryId:queryId,banco:banco,telefono:telefono,email:email,idPlan:idPlan},
					
								url:'ajax/modificarActividadTelefonoEmail.php',
					
								type:'POST',
					
								success:function(response){
									
									console.log("Esto es la tercer actualizacion");
									console.log(response);





									$.ajax({
										data:{documento:documento,idContacto:idContacto,queryId:queryId,banco:banco,telefono:telefono,email:email,idPlan:idPlan},
							
										url:'ajax/confirmarActividad.php',
							
										type:'POST',
							
										success:function(response){
											$("#preloader").html("<div class='exito'><img src='../imagenes/quiero_pagar/tilde.png'><h1>Solicitud enviada</h1><form action='index.php' method='POST'><input type='hidden' name='documento' value='"+documento+"'><button class='contactorapido_btn'>Volver</button></div>");
											
											console.log("Esto es la confirmacion del plan");
											console.log(response);
					
										}
									});







			
								}
							});
			
						}
				});







    
    			}
    	});
	
	
	}//if
}

