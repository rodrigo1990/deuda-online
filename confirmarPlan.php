<?php 

require_once("Clases/Api.php");



$email=$_GET['email'];
$telefono=$_GET['telefono'];

$IdPlan = $_GET['idPlan'];
$idConsulta = $_GET['idConsulta'];

$api = new Api();

$resp2 = $api->confirmarPlan($email,$telefono,$IdPlan,$idConsulta);

echo $resp2;



 ?>