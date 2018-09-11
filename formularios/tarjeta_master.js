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
function enviarDatosTarjeta2(){
	divResultado = document.getElementById('resultadoTarjeta2');

	tel1 = document.tarjeta2.tel1.value;
	tel2 = document.tarjeta2.tel2.value;
	mail = document.tarjeta2.mail.value;
	nombre = document.tarjeta2.nombre.value;
	apellido = document.tarjeta2.apellido.value;
	dni = document.tarjeta2.dni.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((tel1 == "") || (tel2 == "") || (mail == "") || (nombre == "") || (apellido == "") || (dni == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/tarjeta_master.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form2');
		  		oculto_div.style.display = 'none'; 

				divResultado.innerHTML = "<br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.<br />";
				LimpiarCamposF1();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("tel1="+tel1+"&tel2="+tel2+"&mail="+mail+"&nombre="+nombre+"&apellido="+apellido+"&dni="+dni)
 }
}
 
//función para limpiar los campos
function LimpiarCamposF1(){
  document.tarjeta2.tel1.value="";
  document.tarjeta2.tel2.value="";
  document.tarjeta2.mail.value="";
  document.tarjeta2.nombre.value="";
  document.tarjeta2.apellido.value="";
  document.tarjeta2.dni.value="";
}