<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Procesar  Transacciones</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">

				
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Transaccion</h5>
								
							</div>
							<div class="modal-body">
								<?php while ($row = $detalles ->fetch_object()):
									
								?>
								<input type="hidden" name="idusuario" value="<?= $_SESSION['identity']->id ?>"/>
								<div class="form-group">
									<label>Cuenta a enviar </label>
									<input type="text" class="form-control" id="" name="cuenta" value="<?= $row->titular?> --Cuenta: <?= $row->num_cuenta?>" required readonly />
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Valor a enviar</label>
									<input type="text" class="form-control" id="" name="valor" value="<?= number_format($row->valor)?>" required readonly />
								</div>
								<div class="form-group">					
									<div>

										<input type="hidden" id="idUsuario" value="<?= $_SESSION['identity']->id ?>">

										<h4 class="text-center well text-muted text-uppercase">El pago se realizara por</h4>

										<figure class="col-xs-6">

											<center>
												<img src="<?= URL_BASE ?>image/payu.jpg" class="img-thumbnail">
											</center>

										</figure>

									</div>
								</div>

								<form class="formPayu">

									<input name="merchantId" type="hidden" value=""/>
									<input name="accountId" type="hidden" value=""/>
									<input name="description" type="hidden" value=""/>
									<input name="referenceCode" type="hidden" value=""/>	
									<input name="amount" type="hidden" value=""/>
									<input name="tax" type="hidden" value=""/>
									<input name="taxReturnBase" type="hidden" value=""/>
									<input name="shipmentValue" type="hidden" value=""/>
									<input name="currency" type="hidden" value=""/>
									<input name="lng" type="hidden" value="es"/>
									<input name="confirmationUrl" type="hidden" value="" />
									<input name="responseUrl" type="hidden" value=""/>
									<input name="declinedResponseUrl" type="hidden" value=""/>
									<input name="displayShippingInformation" type="hidden" value=""/>
									<input name="test" type="hidden" value="" />
									<input name="signature" type="hidden" value=""/>
									<div class="form-group">
										<center>
											<button class="btn btn-primary" type="submit">
												Procesar Transaccion 
											</button>
										</center>

									</div>
									<?php endwhile; ?>
								</form>

							</div>
							<form class="" method="post" action="<?= URL_BASE ?>giros/posponer">
								<input name="id" type="hidden" value="<?= $_GET['id']?>"/>
								<input name="estado" type="hidden" value="3"/>
								<div class="modal-footer">
									
								<button class="btn btn-secondary" type="submit" >Posponer</button>
								
								</div>
							</form>
						</div>
					</div>
				
			</div>
		</div>
	</div>

</div>




<!-- /.conta