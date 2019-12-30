 <div class="panel-heading" role="tab" id="headingOne" style="background:none; border:0; border-bottom:1px solid #1a9cd6; border-color:none; ">
		                      <h4 class="panel-title">
		                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne" style="height:20px;">
		                        <div class="row"> <div class="div_33">
		                         	<?php  echo $acree->nombre.' '.$acree->grupo; ?>
		                          </div>
		                          <div class="div_33">

									<?php $honorario =  str_replace(',','.',$acreedor->obtenerPauta($i))  ?>

									<?php if($acreedor->obtenerPmonto($i)=="s_cancelacion" && $acree->cancela!=0.00): ?>
										
										<?php if($acreedor->mostrarAcreedor($i) == "WAYNI MOVIL"): ?>
										
											$<?php echo round(str_replace(',','.',$response->cancelaTotal),2); ?>
									
										<?php else: ?>

			                    			$<?php 
			                    			 echo number_format($acree->cancela*$honorario, 2, ',', '.');
			                    			?>
									
										<?php endif; ?>									
									
									<?php else: ?>

										<?php if($acreedor->mostrarAcreedor($i) == "WAYNI MOVIL"): ?>
										
											$<?php echo round(str_replace(',','.',$response->cancelaTotal),2); ?>
									
										<?php else: ?>

											$<?php 

											 echo number_format($acree->saldo*$honorario, 2, ',', '.');
											 ?>	


											 <?php endif; ?>	


									<?php endif; ?>



		                         
										
									

		                          </div>
		                          <div class="div_33">
		                         	<span class="contactorapido_btn">DETALLE</span>
		                          </div>
		                          </div>
		                        </a>
		                      </h4>
		                    </div>
		                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
		                      <div class="panel-body">
		                       <?php
								$acreedor->mostrarPautas($i);
							   ?>
							   <a class='contactorapido_btn_transparent center-block text-center' href="quiero_mas_cuotas.php?documento=<?php echo $documento ?>&nombre=<?php echo str_replace(' ','%20',$response->nombre) ?>&banco=<?php echo $acreedor->mostrarAcreedor($i)?>">QUIERO MAS CUOTAS</a>

		                      </div>
		                    </div>
		                  </div>