 <div class="panel-heading" role="tab" id="headingOne" style="background:none; border:0; border-bottom:1px solid #1a9cd6; border-color:none; ">
		                      <h4 class="panel-title">
		                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne" style="height:20px;">
		                        <div class="row"> <div class="div_33">
		                         	<?php  echo $acree->nombre.' '.$acree->grupo; ?>
		                          </div>
		                          <div class="div_33">

									<?php $honorario =  str_replace(',','.',$acreedor->obtenerPauta($i))  ?>

									<?php if($acreedor->obtenerPmonto($i)=="s_cancelacion" && $acree->cancela!=0.00): ?>
										
		                    			$<?php 
		                    			 echo number_format($acree->cancela*$honorario, 2, ',', '.');
		                    			?>
									
									
									<?php else: ?>
										$<?php 

										 echo number_format($acree->saldo*$honorario, 2, ',', '.');
										 ?>	


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
		                      	<?php include("clientesSupervielle.php") ?>
		                      </div>
		                    </div>
		                  </div>