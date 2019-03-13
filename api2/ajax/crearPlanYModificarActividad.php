<?php 
require_once("../../Clases/Api.php");

$idContacto = $_POST['idContacto'];
$idConsulta = $_POST['queryId'];
$documento = $_POST['documento'];
$nombreAcreedor = $_POST['banco'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$idPlan = "";

//formatear fecha
$hoy = getdate();
$fecha =  $hoy["year"]."".$hoy['mon']."".$hoy['mday'];



$api = new Api();


$idPlan =  $api->nuevoPlanYRetornarIdPLan($idContacto,$idConsulta,$fecha,$documento);


$resp2 = $api->modificarPlanYRetornarIdPLan($idPlan,$idContacto,$idConsulta,0,$nombreAcreedor,0);

//$api->modificarPlanTelefonoEmailYRetornarIdPLan($idPlan,$idContacto,$idConsulta,0,$nombreAcreedor,0,$telefono,$email);


//$resp2 = $api->confirmarPlan($email,$telefono,$idPlan,$idConsulta);

echo $idPlan;








?>