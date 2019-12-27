<?php

class Acreedor{
	
	public $response;
	
	function __construct($res){
		$this->response=$res;
	}
	
	function mostrarPautas($posicion){
		
		
		
		if($this->response->acreedores[$posicion]->saldo!=0 ||  $this->response->acreedores[$posicion]->cancela!=0){
			$acree=$this->response->acreedores[$posicion];
		echo '
		<form action="../mostrar_aceptacion.php" method="post" target="_parent" id="posicion'.$posicion.'">
		<table style="width:100%; max-width:700px; font-size:13px;"  align="center" class="table table-striped">
			<tr>
				<td><strong>¿Cuántas cuotas?</strong></td>
				<td><strong>Descuento</strong></td>
			
				<td><strong>Total</strong></td>
				<td></td>
			</tr>		
			
		';
			$i=1;
			foreach($acree->pautas as $pauta){
				$honorario = str_replace(',','.',$pauta->phono);
				$anticipo = 0;
				$acreedor = $this->mostrarAcreedor($posicion);


				if($pauta->pmonto=="s_cancelacion" && $acree->cancela!='0,00'){

					$monto=($acree->cancela);	
				
				}else{

					$monto=($acree->saldo);
				
				}
				
				$opcion="";

				if($pauta->pant=="True" && $pauta->pantporc!="0,00"){
					$anticipo=($monto*($pauta->pantporc)/100);

					$opcion.="Anticipo de $".$anticipo." y ";
				}
				
				if($monto!='0.00'){

					$cuotas=number_format(($monto/$pauta->pctas),2, ',', '.');	
				
				}else{

					$cuotas='0.00';	

				}
				if($pauta->pctas==1){

					$cta=" cuota ";	

				}else{

					$cta=" cuotas ";	

				}

				//$opcion.=$pauta->pctas.$cta." de $ ".$cuotas;
				
				
				if($i==1){

					$checked=" checked ";	

				}else{

					$checked="";	

				}


				
						
				
						$opcion.=$pauta->pctas.$cta." de $ ".number_format(((($monto - ($monto*($pauta->pdesc)/100))*$honorario)-$anticipo)/$pauta->pctas, 2, ',', '.');
						echo '<tr>';
						echo '<td>'.$opcion.'</td>';
						echo '<td>'.$pauta->pdesc.'%</td>';
						$total = number_format(($monto-($monto*($pauta->pdesc)/100))*$honorario, 2, ',', '.');
						echo '
						<td><strong>$'.$total.'</strong></td>
						<td><input type="radio" name="pauta" '.$checked.' value="'.$opcion.' '.$pauta->pctas.' '.$total.'" /></td>
						
						
						



						</tr>';

		

			

			$i++;
			
			}//fin del for


			echo '<input type="hidden" name="nombreAcreedor" value="'.$acreedor .'">
						<input type="hidden" name="idContacto" value="'.$this->response->idContacto .'">
						<input type="hidden" name="idConsulta" value="'.$this->response->queryId .'">
						<input type="hidden" name="documento" value="'.$_SESSION['documento'].'">
						<input type="hidden" name="cartera" value="'.$this->response->cartera .'">';
			
			
			
			echo '<tr><td colspan="4"><input class="contactorapido_btn center-block" type="submit" value="QUIERO PAGAR" />

					
					
					<input type="hidden" name="response" value="'.htmlspecialchars(serialize($this->response)).'" />
					<input type="hidden" name="posicion" value="'.$posicion.'" />

					</td></tr>


					';
					
			
		echo "</table></form>";

		echo "";
		
		}//fin del if hay monto
		
		
		
	}
	
	
	function mostrarAcreedor($posicion){
		
		if($this->response->acreedores[$posicion]->nombre=="TARSHOP"){
			$acreedor="TARSHOP";	
			}else if($this->response->acreedores[$posicion]->grupo=="COMAFI FIDUCIARIO"){
			$acreedor="COMAFI";	
			}else if($this->response->acreedores[$posicion]->nombre=="SANTANDER RIO"){
			$acreedor="SANTANDER";
			}else if($this->response->acreedores[$posicion]->nombre=="BANCO HIPOTECARIO"){
			$acreedor="HIPOTECARIO";
			}else if($this->response->acreedores[$posicion]->nombre=="GALICIA"){
				$acreedor="GALICIA";
			}else if($this->response->acreedores[$posicion]->nombre=="SUPERVIELLE"){
				$acreedor="SUPERVIELLE";
			}
			else{
			$acreedor="OTROS";	
			}

		return $acreedor;
		
	}//fin mostrarAcreedor

	function obtenerPauta($posicion){

		$acree=$this->response->acreedores[$posicion];


		foreach($acree->pautas as $pauta){
			
			return $pauta->phono;	
			
		}//fin del for

	}//function


	function obtenerPmonto($posicion){

		$acree=$this->response->acreedores[$posicion];


		foreach($acree->pautas as $pauta){
			
			return $pauta->pmonto;	
			
		}//fin del for

	}//function
	
	
	
	
}//fin class

?>