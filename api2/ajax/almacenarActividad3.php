<?php 
require_once("../../Clases/Api.php");

$idContacto = $_POST['idContacto'];
$idConsulta = $_POST['queryId'];
$documento = $_POST['documento'];
$nombreAcreedor = $_POST['banco'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$idPlan = $_POST['idPlan'];

//formatear fecha
$hoy = getdate();
$fecha =  $hoy["year"]."".$hoy['mon']."".$hoy['mday'];



$api = new Api();

$resp2 = $api->confirmarPlan($email,$telefono,$idPlan,$idConsulta);

var_dump($resp2);








?>