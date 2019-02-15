<?php 
$id="4074035";
$idConsulta="12555";
$fecha="20190131";
$documento="10014748";
$user="tuc";
$pass="ola";

$planId="165";
$contactoId="4074035";
$consultaId="12555";
$nombreAcreedor="TARSHOP";
$cantCuotas="25";
$monto="27.405,00";



$fields = array();
		$fields['op']="ADDPLN";
		$fields['contid']=$id;
		$fields['consuid']=$idConsulta;
		$fields['fecplan']=$fecha;
		$fields['ndoccuil']=$documento;
		$fields['user']=$user;
		$fields['pwd']=$pass;
				
		$fields_string = http_build_query ($fields);

		echo "1";
		echo "<br>";

		echo $fields_string;


		$fields = array();
		$fields['op']="MODPLN";
		$fields['planid']=$planId;
		$fields['contid']=$contactoId;
		$fields['consuid']=$consultaId;
		$fields['ctasplan']=$cantCuotas;
		$fields['acreedorplan']=$nombreAcreedor;
		$fields['montoplan']=$monto;
		$fields['user']=$user;
		$fields['pwd']=$pass;
				
		$fields_string = http_build_query ($fields);



		echo "2";
		echo "<br>";

		echo $fields_string;
		


 ?>