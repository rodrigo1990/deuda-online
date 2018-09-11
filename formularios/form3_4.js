// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosF3_4(){
	divResultado = document.getElementById('resultadoF3_4');

	numero_envio = document.form3_4.numero_envio.value;
	monto = document.form3_4.monto.value;
	fecha = document.form3_4.fecha.value;
	titular_tarjeta = document.form3_4.titular_tarjeta.value;
	nombre = document.form3_4.nombre.value;
	telefono = document.form3_4.telefono.value;
	dni = document.form3_4.dni.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((numero_envio == "") || (monto == "") || (fecha == "") || (titular_tarjeta == "") || (nombre == "") || (telefono == "") || (dni == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form3_4.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form3_1');
		  		oculto_div.style.display = 'none';  

				divResultado.innerHTML = "<br /><br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.";
				LimpiarCamposF3_1();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("numero_envio="+numero_envio+"&monto="+monto+"&fecha="+fecha+"&titular_tarjeta="+titular_tarjeta+"&nombre="+nombre+"&telefono="+telefono+"&dni="+dni)
 }
}
 
//función para limpiar los campos
function LimpiarCamposF3_1(){
  document.form3_4.numero_envio.value="";
  document.form3_4.monto.value="";
  document.form3_4.fecha.value="";
  document.form3_4.titular_tarjeta.value="";
  document.form3_4.nombre.value="";
  document.form3_4.telefono.value="";
  document.form3_4.dni.value="";
}