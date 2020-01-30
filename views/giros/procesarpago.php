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
							<h5 class="modal-title" id="exampleModalLabel">Procesar Transaccion</h5>

						</div>
						<div class="modal-body">
							<?php
							$idtran = $_GET['id'];
							$idUsuario = $_SESSION['identity']->id;
							$detalles = girosController::transacionesUsuario($idtran, $idUsuario);
							
							while ($row = $detalles->fetch_object()):
								?>
								<input type="hidden" name="idusuario" value="<?= $_SESSION['identity']->id ?>"/>
								<div class="form-group">
									<label>Cuenta a enviar </label>
									<input type="text" class="form-control" id="" name="cuenta" value="<?= $row->titular ?> --Cuenta: <?= $row->num_cuenta ?>" required readonly />
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Valor a enviar</label>
									<input type="text" class="form-control" id="" name="valor" value="<?= number_format($row->valor) ?>" required readonly />
								</div>
								<div class="form-group">					
									<div>

										<input type="hidden" id="idUsuario" value="<?= $_SESSION['identity']->id ?>">

										<h4 class="text-center well text-muted text-uppercase">El pago se realizara por</h4>

										<figure class="col-xs-6">

											<center>
												<img src="<?= URL_BASE ?>image/efecty.jpg" class="img-thumbnail">
											</center>

										</figure>

									</div>
								</div>

								<form  method="post" action="<?= URL_BASE ?>giros/procesarpago">
									<input name="id" type="hidden" value="<?= $_GET['id'] ?>"/>
									<input name="idUsuario" type="hidden" value="<?= $_SESSION['identity']->id ?>"/>
									<input name="estado" type="hidden"  value="4"/>
									<center>
										<button class="btn btn-primary" type="submit">
											Procesar Transaccion 
										</button>
									</center>
							</form>
								<form class="" method="post" action="<?= URL_BASE ?>giros/posponer">
								<input name="id" type="hidden" value="<?= $_GET['id'] ?>"/>
								<input name="idUsuario" type="hidden" value="<?= $_SESSION['identity']->id ?>"/>
								<input name="estado" type="hidden"  value="5"/>
								<div class="modal-footer">

							<button class="btn btn-secondary" type="submit" >Posponer</button>

						</div>
					</form>

							</div>

						<?php endwhile; ?>
					</div>
					
				</div>
			</div>

		</div>
	</div>
</div>

</div>




<!-- /.conta