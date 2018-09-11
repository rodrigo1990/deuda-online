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
function enviarDatosF4_2(){
	divResultado = document.getElementById('resultadoF4_2');

	oculto_div = document.getElementById('hidden_form4');
	oculto_div.style.display = 'none'; 

	divResultado.innerHTML = "<br /><br />Dentro de las 48 hs h&aacute;biles ser&aacute; procesado su pedido de baja. Muchas gracias por utilizar el servicio de deuda online.<br />";
	LimpiarCamposF4();

	/*
	tel1 = document.form4.tel1.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if(tel1 == "")
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form4_1.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form4');
		  		oculto_div.style.display = 'none'; 

				divResultado.innerHTML = "<br /><br />Dentro de las 48 hs h&aacute;biles ser&aacute; procesado su pedido de baja. Muchas gracias por utilizar el servicio de deuda online.<br /><br /><br />";
				LimpiarCamposF4();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("tel1="+tel1)
 	}
 	*/
}
 
//función para limpiar los campos
function LimpiarCamposF4(){
  document.form4.tel1.value="";
}