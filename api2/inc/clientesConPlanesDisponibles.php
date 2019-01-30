<div class="center-block paso-a-paso-cont"  style="">
	            <img src="../imagenes/quiero_pagar/paso-1.png" class="paso-a-paso">
	            <img src="../imagenes/quiero_pagar/paso-inactive-2.png" class="paso-a-paso" >
	            <img src="../imagenes/quiero_pagar/paso-inactive-3.png" class="paso-a-paso">
	        </div>
<div class="col-sm-12"><span class="hf_tabla"><?php  echo $response->nombre; ?></span></div>

<div class="col-sm-12 text-center" style="font-size: 16px; color:#404041; margin-bottom: 20px;"><b>
                El detalle de su deuda<br />al día de la fecha es el siguiente: </b></div>

<table style="width: 100%; max-width: 700px; margin: auto; margin-bottom:30px; font-weight: 400;  text-align:center;">
					<thead style="border-bottom: 1px solid #1a9cd6; height: 50px;">
						<tr>
							<th style="color: #1a9cd6; text-align:center; padding-bottom: 5px; text-transform: uppercase; font-size: 13px;">Producto</th>
							<th style="color: #1a9cd6; text-align:center; padding-bottom: 5px; text-transform: uppercase; font-size: 13px;">Acreedor</th>
							<th style="color: #1a9cd6; text-align:center; padding-bottom: 5px; text-transform: uppercase; font-size: 13px;">USTED DEBE</th>
						
						
						</tr>
					</thead>
					<tbody>
						<?php

						 $i=0;
						 $k=0;

						 ?>
						<?php foreach($response->acreedores as $acree) :  ?>
                        	<?php ?>
							<?php
								
								foreach($acree->productos as $producto):

								$nombreBanco  = 
	
								$fecha_deuda =time();
								$fecha_deuda = substr($fecha_deuda, 0, 10);

								$dia_deuda = substr($fecha_deuda, 0, 2);
								$mes_deuda = substr($fecha_deuda, 3, 2);
								$anio_deuda = substr($fecha_deuda, 6, 4);

								$fecha_rev = $anio_deuda . '-' . $mes_deuda . '-' . $dia_deuda;

								$now = time();
								$your_date = strtotime($fecha_rev);
								$datediff = $now - $your_date;
								$cant_dias = floor($datediff / (60 * 60 * 24));

								$saldo = $producto->saldo;

								$mora = ($cant_dias * 9)/100;
								$adicional = ($saldo * $mora)/100;

								$total = round($saldo + $adicional);

								$cuota_1 = round($saldo);
								$cuota_2 = round((($total * 25)/100 + $total) / 2);
								$cuota_3 = round($total / 3);

								if($producto->nombre == "TJ")
								{
									$producto_nombre = "Tarjeta de Crédito";
								}
								elseif($producto->nombre == "PR")
								{
									$producto_nombre = "Préstamo Personal";
								}
								elseif($producto->nombre == "CC")
								{
									$producto_nombre = "Cuenta corriente";
								}
								else
								{
									$producto_nombre = $producto->nombre;
								}
								 /*$k++;
								echo "k=".$k."";*/
							?>
							<tr style="border-bottom: 1px solid #6d6e70; font-size: 13px; height: 30px; text-align:center;">
								<th style="text-align:center;"><?php echo $producto_nombre; ?></th>
								<th style="text-align:center;"><?php  echo $acree->nombre." ".$acree->grupo; ?></th>

								<?php $honorario =  str_replace(',','.',$acreedor->obtenerPauta($i))  ?>

								<?php if($acreedor->obtenerPmonto($i)=="s_cancelacion" && $producto->cancela != 0.00): ?>
								
									<th style="text-align:center;">$<?php echo round(str_replace(',','.',$producto->cancela*$honorario),2); ?></th>
								
								<?php else: ?>

										<th style="text-align:center;">$<?php echo round(str_replace(',','.',$producto->saldo*$honorario),2); ?></th>

								<?php endif; ?>
							
							</tr>
                            <?php
								endforeach
							?>
						<?php 

						$i++;

						//echo "i=".$i."";
						endforeach;


						 ?>
                        <tr>
                        	<td style="text-align:center; font-weight:bold; font-size: 13px; height: 30px; color:#1a9cd6">TOTAL</td>
                            <td></td>
                          


                        	<?php $honorario =  str_replace(',','.',$acreedor->obtenerPauta(0))  ?>


                        	<?php if($acreedor->obtenerPmonto(0)=="s_cancelacion" && $producto->cancela != 0.00): ?>
								
                        		<td style="text-align:center; font-weight:bold;font-size: 13px; height: 30px; color:#1a9cd6">$<?php if($acree->cancela*$honorario!=0){ echo number_format($acree->cancela*$honorario*1, 2, ',', '.');} ?></td>
								
							<?php else: ?>

                    			<td style="text-align:center; font-weight:bold;font-size: 13px; height: 30px; color:#1a9cd6">$<?php if($acree->saldo*$honorario!=0){ echo number_format($acree->saldo*$honorario*1, 2, ',', '.');} ?></td>

							<?php endif; ?>


                          

                        </tr>
					</tbody>
				</table>
                <?php
				
				
				$acreedor->mostrarPautas(0);
				
				?>
			
				<a class='contactorapido_btn_transparent center-block text-center' href="quiero_mas_cuotas.php?documento=<?php echo $documento ?>&nombre=<?php echo str_replace(' ','%20',$response->nombre) ?>&banco=<?php echo $acreedor->mostrarAcreedor(0)?>">QUIERO MAS CUOTAS</a>