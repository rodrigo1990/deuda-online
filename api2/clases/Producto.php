<?php 
class Producto{

	public $response;

	function __construct($response){

		$this->response = $response;
	}

	public function listarNombreDeCliente($response){


		if($response && $response->status != 'OK') {
				 echo '<h1 style="color: red">'.$response->status.'</h1>';
			}
			if($response && $response->status == 'OK'){
            
            	echo '<div class="col-sm-12"><span class="hf_tabla">'.$response->nombre.'</span></div>
				<div class="col-sm-12 text-center" style="font-size: 16px; color:#404041; margin-bottom: 20px;"><b>
                El detalle de su deuda<br />al día de la fecha es el siguiente: </b></div>';
            }

	}


}





 ?>