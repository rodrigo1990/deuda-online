<?php

$empresa="0420";
$dni="36298077";
$dni_8=str_pad($dni, 8, "0", STR_PAD_LEFT); 
$string=$empresa.$dni_8;


//calculamos el dígito verificador 1
$secuencia_datos=str_split($string);
$secuencia=array("1","3","5","7","9","3","5","7","9","1","3","5");

$suma=0;

for($i=0; $i<12; $i++){
$suma+=($secuencia_datos[$i]*$secuencia[$i]);
	
}

$digito_verificador1=(floor($suma/2))%10;

//calculamos el dígito verificador 2
$string2=$string.$digito_verificador1;

$secuencia_datos=str_split($string2);
$secuencia=array("1","3","5","7","9","3","5","7","9","1","3","5", "7");

$suma=0;

for($i=0; $i<13; $i++){
$suma+=($secuencia_datos[$i]*$secuencia[$i]);
	
}

 $digito_verificador2=(floor($suma/2))%10;
 
$string_final=$string.$digito_verificador1.$digito_verificador2;

?>