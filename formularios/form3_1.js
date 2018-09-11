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
function enviarDatosF3_1(){
	divResultado = document.getElementById('resultadoF3_1');

	banco = document.form3_1.banco.value;
	sucursal = document.form3_1.sucursal.value;
	numero = document.form3_1.numero.value;
	fecha = document.form3_1.fecha.value;
	monto = document.form3_1.monto.value;
	dni = document.form3_1.dni.value;
	telefono = document.form3_1.telefono.value;

	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if((banco == "") || (sucursal == "") || (numero == "") || (fecha == "") || (monto == "") || (dni == "") || (telefono == ""))
	{
		alert("Por favor, complete todos los campos.");
	}
	else
	{
		  ajax=objetoAjax();

		  ajax.open("POST", "formularios/form3_1.php",true);
		  ajax.onreadystatechange=function() {
		  	if (ajax.readyState==4) {
		  		oculto_div = document.getElementById('hidden_form3_1');
		  		oculto_div.style.display = 'none';  

				divResultado.innerHTML = "<br /><br />Deuda Online  le agradece su tiempo. En instantes nos estaremos contactando con usted.<br />";
				LimpiarCamposF3_1();
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("banco="+banco+"&sucursal="+sucursal+"&numero="+numero+"&fecha="+fecha+"&monto="+monto+"&dni="+dni+"&telefono="+telefono)
 }
}
 
//función para limpiar los campos
function LimpiarCamposF3_1(){
  document.form3_1.banco.value="";
  document.form3_1.sucursal.value="";
  document.form3_1.numero.value="";
  document.form3_1.fecha.value="";
  document.form3_1.monto.value="";
  document.form3_1.dni.value="";
  document.form3_1.telefono.value="";
}