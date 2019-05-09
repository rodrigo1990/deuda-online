<?php 

class Api{

	public $url;
	public $user;
	public $pass;

	function __construct(){

		$this->url="http://190.12.119.212:8099";
		$this->user	= 'lcreativa';
		$this->pass	= 'p4lm3r0_2016';
	}


	function nuevoPlanYRetornarIdPLan($id,$idConsulta,$fecha,$documento) {
		
		$fields = array();
		$fields['op']="ADDPLN";
		$fields['contid']=$id;
		$fields['consuid']=$idConsulta;
		$fields['fecplan']=$fecha;
		$fields['ndoccuil']=$documento;
		$fields['user']=$this->user;
		$fields['pwd']=$this->pass;
				
		$fields_string = http_build_query ($fields);
		
		$contextData = array ( 
			'method' => 'POST',
			'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Connection: close\r\n".
			"Content-Length: ".strlen($fields_string)."\r\n",
			'content'=> $fields_string );

		$context = stream_context_create (array ( 'http' => $contextData ));
		
		$datos =  file_get_contents (
			$this->url,  
			false,
			$context);



	

		//$resp=json_encode($datos);
		
		$dom = new DomDocument();
		$loadXML = @$dom->loadXML($datos);
		$simplexml 	= simplexml_import_dom($dom);

		//$respuesta=$simplexml->Resultado->idplan;
	
		return $simplexml->Resultado->idplan;
	}


	function modificarPlanYRetornarIdPLan($planId,$contactoId,$consultaId,$cantCuotas,$nombreAcreedor,$monto) {
		
		$fields = array();
		$fields['op']="MODPLN";
		$fields['planid']=$planId;
		$fields['contid']=$contactoId;
		$fields['consuid']=$consultaId;
		$fields['ctasplan']=$cantCuotas;
		$fields['acreedorplan']=$nombreAcreedor;
		$fields['montoplan']=$monto;
		$fields['user']=$this->user;
		$fields['pwd']=$this->pass;
				
		$fields_string = preg_replace('/%5B(\d+?)%5D/', '',http_build_query ($fields));
		
		$contextData = array ( 
			'method' => 'POST',
			'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Connection: close\r\n".
			"Content-Length:".strlen($fields_string)."\r\n",
			'content'=> $fields_string );

		$context = stream_context_create (array ( 'http' => $contextData ));
		
		$datos =  file_get_contents (
			$this->url,  
			false,
			$context);



	

		//$resp=json_encode($datos);
		
		$dom = new DomDocument();
		$loadXML = @$dom->loadXML($datos);
		$simplexml 	= simplexml_import_dom($dom);

		
	
		return $simplexml;
	}


	function modificarPlanTelefonoEmailYRetornarIdPLan($planId,$contactoId,$consultaId,$cantCuotas,$nombreAcreedor,$monto,$telefono,$email) {
		
		$fields = array();
		$fields['op']="MODPLN";
		$fields['planid']=$planId;
		$fields['contid']=$contactoId;
		$fields['consuid']=$consultaId;
		$fields['ctasplan']=$cantCuotas;
		$fields['acreedorplan']=$nombreAcreedor;
		$fields['montoplan']=$monto;
		$fields['user']=$this->user;
		$fields['pwd']=$this->pass;
		$fields['tel']=$telefono;
		$fields['mail']=$email;
				
		$fields_string = http_build_query ($fields);
		
		$contextData = array ( 
			'method' => 'POST',
			'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Connection: close\r\n".
			"Content-Length: ".strlen($fields_string)."\r\n",
			'content'=> $fields_string );

		$context = stream_context_create (array ( 'http' => $contextData ));
		
		$datos =  file_get_contents (
			$this->url,  
			false,
			$context);



	

		//$resp=json_encode($datos);
		
		$dom = new DomDocument();
		$loadXML = @$dom->loadXML($datos);
		$simplexml 	= simplexml_import_dom($dom);

		$respuesta=$simplexml->Resultado->mensaje;
	
		return $respuesta;
	}



	function confirmarPlan($email,$telefono,$IdPlan,$idConsulta) {
		
		$fields = array();
		$fields['op']="CLOSEPLN";
		$fields['planid']=$IdPlan;
		$fields['consuid']=$idConsulta;
		$fields['tel']=$telefono;
		$fields['mail']=$email;
		$fields['user']=$this->user;
		$fields['pwd']=$this->pass;
				
		$fields_string = http_build_query ($fields);
		
		$contextData = array ( 
			'method' => 'POST',
			'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Connection: close\r\n".
			"Content-Length: ".strlen($fields_string)."\r\n",
			'content'=> $fields_string );

		$context = stream_context_create (array ( 'http' => $contextData ));
		
		$datos =  file_get_contents (
			$this->url,  
			false,
			$context);



	

		//$resp=json_encode($datos);
		
		$dom = new DomDocument();
		$loadXML = @$dom->loadXML($datos);
		$simplexml 	= simplexml_import_dom($dom);

		$respuesta=$simplexml->Resultado->mensaje;
	
		return $respuesta;
	}


	

}//class


 ?>