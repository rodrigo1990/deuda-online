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

				$monto-=($monto*($pauta->pdesc)/100);
				
				$opcion="";

				if($pauta->pant=="True" && $pauta->pantporc!="0,00"){
					$anticipo=($monto*($pauta->pantporc)/100);
					
					//Si el cliente es santander restamos el anticipo despues del calculo de descuento y honorario
					if($acreedor != 'SANTANDER'){
						$monto=$monto-$anticipo;
					}
					
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

				$opcion.=$pauta->pctas.$cta." de $ ".$cuotas;
				
				
				if($pauta->pmonto=="s_cancelacion" && $acree->cancela!='0,00'){

					$monto=($acree->cancela);	

				}else{

					$monto=($acree->saldo);

				}
				if($i==1){

					$checked=" checked ";	

				}else{

					$checked="";	

				}

				
				//si el acreedor es SANTANDER RIO se van a aplicar los montos y opciones de la manera que las reglas de negocio
				//para santander rio indican
				if($acreedor == 'SANTANDER'){
				
						$opcion=$pauta->pctas.$cta." de $ ".number_format((($monto-($monto*($pauta->pdesc)/100))  * $honorario - $anticipo)/$pauta->pctas, 2, ',', '.');
						echo '<tr>';
						echo '<td>'.$opcion.'</td>';
						echo '<td>'.$pauta->pdesc.'%</td>';
						echo '
						<td><strong>$'.number_format(($monto-($monto*($pauta->pdesc)/100))  * $honorario - $anticipo, 2, ',', '.').'</strong></td>
						<td><input type="radio" name="pauta" '.$checked.' value="'.$opcion.'"  /></td>
						</tr>';

				//sino de otra manera para los clientes del resto de las carteras
				}else{
					echo '<tr>';
					echo '<td>'.$opcion.'</td>';
					echo '<td>'.$pauta->pdesc.'%</td>';
					echo '
					<td><strong>$'.number_format(($monto-($monto*($pauta->pdesc)/100)), 2, ',', '.').'</strong></td>
					<td><input type="radio" name="pauta" '.$checked.' value="'.$opcion.'"  /></td>
					</tr>';

				}

			$i++;
			
			}//fin del for
			
			
			
			echo '<tr><td colspan="4"><input class="contactorapido_btn center-block" type="submit" value="QUIERO PAGAR" />
					
					
					<input type="hidden" name="response" value="'.htmlspecialchars(serialize($this->response)).'" />
					<input type="hidden" name="posicion" value="'.$posicion.'" />
					</td></tr>';
					
			
		echo "</table></form>";
		
		}//fin del if hay monto
		
		
		
	}
	
	
	function mostrarAcreedor($posicion){
		
		if($this->response->acreedores[$posicion]->nombre=="TARSHOP"){
			$acreedor="TARSHOP";	
			}else if($this->response->acreedores[$posicion]->grupo=="COMAFI FIDUCIARIO"){
			$acreedor="COMAFI";	
			}else if($this->response->acreedores[$posicion]->nombre=="SANTANDER RIO"){
			$acreedor="SANTANDER";
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
	
	
	
	
}//fin class

?>