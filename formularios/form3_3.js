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
function enviarDatosF3_3(){
	divResultado = document.getElementById('resultadoF3_3');

	dni = document.form3_3.dni.value;
	monto = document.form3_3.monto.value;
	fecha = document.form3_3.fecha.value;
	telefono = document.form3_3.telefono.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((dni == "") || (monto == "") || (fecha == "") || (telefono == "") || (monto == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form3_3.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form3_1');
		  		oculto_div.style.display = 'none';  

				divResultado.innerHTML = "<br /><br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.<br />";
				LimpiarCamposF3_1();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("dni="+dni+"&monto="+monto+"&fecha="+fecha+"&telefono="+telefono)
 }
}
 
//función para limpiar los campos
function LimpiarCamposF3_1(){
  document.form3_3.dni.value="";
  document.form3_3.monto.value="";
  document.form3_3.fecha.value="";
  document.form3_3.telefono.value="";
}