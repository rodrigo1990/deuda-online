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
function enviarDatosF3_2(){
	divResultado = document.getElementById('resultadoF3_2');

	dni = document.form3_2.dni.value;
	banco_envia = document.form3_2.banco_envia.value;
	banco_recibe = document.form3_2.banco_recibe.value;
	numero_operacion = document.form3_2.numero_operacion.value;
	monto = document.form3_2.monto.value;
	fecha = document.form3_2.fecha.value;
	numero_cuenta = document.form3_2.numero_cuenta.value;
	telefono = document.form3_2.telefono.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((dni == "") || (banco_envia == "") || (banco_recibe == "") || (numero_operacion == "") || (monto == "") || (fecha == "") || (numero_cuenta == "") || (telefono == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form3_2.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form3_1');
		  		oculto_div.style.display = 'none';  

				divResultado.innerHTML = "<br /><br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.<br />";
				LimpiarCamposF3_1();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("dni="+dni+"&banco_envia="+banco_envia+"&banco_recibe="+banco_recibe+"&numero_operacion="+numero_operacion+"&monto="+monto+"&fecha="+fecha+"&numero_cuenta="+numero_cuenta+"&telefono="+telefono)
 }
}
 
//función para limpiar los campos
function LimpiarCamposF3_1(){
  document.form3_2.dni.value="";
  document.form3_2.banco_envia.value="";
  document.form3_2.banco_recibe.value="";
  document.form3_2.numero_operacion.value="";
  document.form3_2.monto.value="";
  document.form3_2.fecha.value="";
  document.form3_2.numero_cuenta.value="";
  document.form3_2.telefono.value="";
}