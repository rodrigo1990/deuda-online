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
function enviarDatosF2(){
	divResultado = document.getElementById('resultadoF2');

	dni = document.form2.dni.value;
	mail1 = document.form2.mail1.value;
	mail2 = document.form2.mail2.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((dni == "") || (mail1 == "") || (mail2 == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form1_2.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form2');
		  		oculto_div.style.display = 'none';  

				divResultado.innerHTML = "<br /><br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.<br />";
				LimpiarCamposF2();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("dni="+dni+"&mail1="+mail1+"&mail2="+mail2)
 }
}
 
//función para limpiar los campos
function LimpiarCamposF2(){
  document.form2.dni.value="";
  document.form2.mail1.value="";
  document.form2.mail2.value="";
}