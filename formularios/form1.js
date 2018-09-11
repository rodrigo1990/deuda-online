// JavaScript Document
 
// Funci�n para recoger los datos de PHP seg�n el navegador, se usa siempre.
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
 
//Funci�n para recoger los datos del formulario y enviarlos por post  
function enviarDatosF1(){
	divResultado = document.getElementById('resultadoF1');

	dni = document.form1.dni.value;
	tel1 = document.form1.tel1.value;
	tel2 = document.form1.tel2.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((dni == "") || (tel1 == "") || (tel2 == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form1.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form1');
		  		oculto_div.style.display = 'none'; 

				divResultado.innerHTML = "<br /><br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.<br />";
				LimpiarCamposF1();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("dni="+dni+"&tel1="+tel1+"&tel2="+tel2)
 }
}
 
//funci�n para limpiar los campos
function LimpiarCamposF1(){
  document.form1.dni.value="";
  document.form1.tel1.value="";
  document.form1.tel2.value="";
}