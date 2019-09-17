<?php
	
	



	function httpConsultarDocumento($url, $user, $pwd, $documento = '', $telefono = '', $mail = '', $culture = '') {
		$debug  	= true;
		$useCurl	= true;
	
		if($debug) {
			error_reporting(0);
		}
		
		
		$fields = array();
		$fields['op'] 	= 'info';
		$fields['doc'] 	= $documento;
		$fields['user']	= $user;
		$fields['pwd']	= $pwd;
		
		if($telefono) {
			$fields['tel'] 	= $telefono;
		}
		
		if($mail) {
			$fields['mail'] 	= $mail;
		}
		
		if($culture) {
			$fields['culture'] 	= $culture;
		}

		
		$fields_string = http_build_query ($fields);

		if($useCurl) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER,			false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,	true);
			curl_setopt($ch, CURLOPT_MAXREDIRS,		10);
			curl_setopt($ch, CURLOPT_ENCODING,		'');
			curl_setopt($ch, CURLOPT_USERAGENT,		'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36');
			curl_setopt($ch, CURLOPT_AUTOREFERER,	true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,	120);
			curl_setopt($ch, CURLOPT_TIMEOUT,		120);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			$result = curl_exec($ch);
			curl_close($ch);

		} else {
			
			$contextData = array ( 
				'method' => 'POST',
				'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Connection: close\r\n".
				"Content-Length: ".strlen($fields_string)."\r\n",
				'content'=> $fields_string );

			$context = stream_context_create (array ( 'http' => $contextData ));
			
			$result =  file_get_contents (
				$url,  
				false,
				$context);


		}
	
		

		$response =  new StdClass();
		

		
		if(!$result) {
			$response->status = 'ERROR DE COMUNICACION'; 
			return $response;
		}
		$dom = new DomDocument();
		
		
		$loadXML = @$dom->loadXML($result);
		

		if(!$loadXML) {
			$response->status = 'ERROR NO ES UN XML';
			if($debug) {
				$response->status .= ' (' . $result . ')';
			}
			return $response;
		}

		$response->status = 'OK';
		
			
 


		$simplexml 	= simplexml_import_dom($dom);
		//print_r($simplexml);
		$response->queryStart 	= isset($simplexml->QueryStart) ? trim(strval($simplexml->QueryStart)) : '';

		$response->queryType 	= isset($simplexml->QueryType) ? trim(strval($simplexml->QueryType)) : '';
		
		$response->queryEnd 	= isset($simplexml->QueryEnd) ? trim(strval($simplexml->QueryEnd)) : '';
		
		$response->documento 	= $documento;
		
		$response->idContacto = isset($simplexml->Resultado->idcontacto) ? trim(strval($simplexml->Resultado->idcontacto)) : '';

		$response->queryId = isset($simplexml->query_id) ? trim(strval($simplexml->query_id)) : ''; 
	
		$response->nombre 		= isset($simplexml->Resultado->nombre) ? trim(strval($simplexml->Resultado->nombre)) : '';

		$response->cuil 		= isset($simplexml->Resultado->cuil) ? trim(strval($simplexml->Resultado->cuil)) : $documento;

		$response->cantProd		= isset($simplexml->Resultado->cant_prod) ? trim(strval($simplexml->Resultado->cant_prod)) : '';
		$response->saldoTotal 	= isset($simplexml->Resultado->SaldoTotal) ? trim(strval($simplexml->Resultado->SaldoTotal)) : '';
		$response->cancelaTotal 	= isset($simplexml->Resultado->CancelaTotal) ? trim(strval($simplexml->Resultado->CancelaTotal)) : '';
		$response->MonTotCtas1 	= isset($simplexml->Resultado->MonTotCtas1) ? trim(strval($simplexml->Resultado->MonTotCtas1)) : '';
			
		$response->MonTotCtas2 	= isset($simplexml->Resultado->MonTotCtas2) ? trim(strval($simplexml->Resultado->MonTotCtas2)) : '';
		$response->MonTotCtas3 	= isset($simplexml->Resultado->MonTotCtas3) ? trim(strval($simplexml->Resultado->MonTotCtas3)) : '';
		$response->cartera = isset($simplexml->Resultado->Acreedor->attributes()->cartera) ? trim(strval($simplexml->Resultado->Acreedor->attributes()->cartera)) : ''; 
		
		$response->cartera = str_replace('Campaña','Campania',$response->cartera); 
		
		
		//comienza acreedores
		
		$response->acreedores=array();
		$max2 = isset($simplexml->Resultado->Acreedor) ? count($simplexml->Resultado->Acreedor) : 0;
		
		for($j = 0; $j < $max2; $j++) {
			$acreedor= new StdClass();
			$acreedor->pautas=array();
		
		/*empieza pautas*/
	//	$response->pautas=array();	
		
		$max = isset($simplexml->Resultado->Acreedor[$j]->pautas->p) ? count($simplexml->Resultado->Acreedor[$j]->pautas->p) : 0;
			
		for($i = 0; $i < $max; $i++) {
			$pauta =  new StdClass();
			$pauta->pindex = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pindex) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pindex)) : '';
			$pauta->pmonto = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pmonto) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pmonto)) : '';
			$pauta->pctas = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pctas) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pctas)) : '';
			$pauta->pant = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pant) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pant)) : '';		
			$pauta->pantporc = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pantporc) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pantporc)) : '';
			$pauta->pdesc = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pdesc) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pdesc)) : '';
			$pauta->ptitulo = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->ptitulo) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->ptitulo)) : '';
			$pauta->phono = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->phono) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->phono)) : '';
			$pauta->tasa = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->tasa) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->tasa)) : '';
			$pauta->tipo_tasa = isset($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->tipo_tasa) ? trim(strval($simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->tipo_tasa)) : '';
			
			$acreedor->pautas[$i] = $pauta;


			/*echo "<br>";
			echo $simplexml->Resultado->Acreedor[$j]->pautas->p[$i]->pmonto;*/
		}
			
		/*termina pauta, empieza productos*/	
		$acreedor->productos = array();
		$max = isset($simplexml->Resultado->Acreedor[$j]->Productos->pr) ? count($simplexml->Resultado->Acreedor[$j]->Productos->pr) : 0;
		$tot_saldo=0;
		$tot_cancela=0;	
			
		for($i = 0; $i < $max; $i++) {
			$producto =  new StdClass();
			$producto->nombre  	= isset($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->nombre) ? trim(strval($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->nombre)) : '';
			$producto->moneda = isset($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->moneda) ? trim(strval($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->moneda)) : '';
			$producto->moneda 	= isset($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->moneda) ? trim(strval($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->moneda)) : '';
			$producto->saldo = isset($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->saldo) ? trim(strval($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->saldo)) : '';
			$producto->cancela = isset($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->cancela) ? trim(strval($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->cancela)) : '';
			$acreedor->productos[$i] = $producto;
			$tot_saldo+=isset($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->saldo) ? trim(strval($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->saldo)) : 0;;
			$tot_cancela+=isset($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->cancela) ? trim(strval($simplexml->Resultado->Acreedor[$j]->Productos->pr[$i]->cancela)) : 0;
				



		}//fin de productos


		
		$acreedor->saldo=$tot_saldo;
		$acreedor->cancela=$tot_cancela;
		$acreedor->nombre = isset($simplexml->Resultado->Acreedor[$j]['nombre']) ? trim(strval($simplexml->Resultado->Acreedor[$j]['nombre'])) : '';
		$acreedor->grupo = isset($simplexml->Resultado->Acreedor[$j]['grupo']) ? trim(strval($simplexml->Resultado->Acreedor[$j]['grupo'])) : '';
		
		$response->acreedores[$j]=$acreedor;
		
		}// fin del for acreedores
		
	
		return $response;
	}

	





	
			


