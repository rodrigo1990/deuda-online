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
function enviarDatosForm_Contacto(){
	divResultado = document.getElementById('resultadoFormContacto');

	nombre = document.form_contacto.nombre.value;
	dni = document.form_contacto.dni.value;
	motivo = document.form_contacto.motivo.value;
	medio_contacto = document.form_contacto.medio_contacto.value;
	mail = document.form_contacto.mail.value;
	cel = document.form_contacto.cel.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((nombre == "") || (dni == "") || (mail == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form_contacto.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		divResultado.innerHTML = "<br /><br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.<br />";
				LimpiarCamposF1();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("nombre="+nombre+"&dni="+dni+"&motivo="+motivo+"&medio_contacto="+medio_contacto+"&cuenta="+mail+"&cel="+cel)
 }
}
 
//función para limpiar los campos
function LimpiarCamposF1(){
  document.form_contacto.nombre.value="";
  document.form_contacto.dni.value="";
  document.form_contacto.motivo.value="";
  document.form_contacto.mail.value="";
  document.form_contacto.cel.value="";
}