<div class="container-fluid">

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Procesar  Transacciones</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">




				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confirmar Transaccion</h5>

					</div>

					<div class="card-body">
						<div class="card-body col-6" role="document">

							<?php 
							$idtran = $_GET['id'];
							$idUsuario = $_SESSION['identity']->id;
							$detalles = girosController::transacionesUsuario($idtran, $idUsuario);
							while ($row = $detalles->fetch_object()):
								?>
								<input type="hidden" name="idusuario" value="<?= $_SESSION['identity']->id ?>"/>
								<div class="form-group">
									<label>Cuenta a enviar </label>
									<input type="text" class="form-control"  name="cuenta" value="<?= $row->titular ?> --Cuenta: <?= $row->num_cuenta ?>" required readonly />
								</div>
								<div class="form-group">
									<label>Valor a enviar</label>
									<input type="text" class="form-control"  name="valor" value="<?= number_format($row->valor) ?>" required readonly />
								</div>
								<?php endwhile; ?>
								<form  method="post" action="<?= URL_BASE ?>giros/confirmarpago" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
									<div class="form-group">					

										<label>Cargue la imagen el volante de consignacion</label>
										
										<input type="file" name="imagen" class="form-control" />

									</div>

									<center>
										<button class="btn btn-primary" type="submit">
											Confirmar 
										</button>
									</center>

								</form>		
							</div>

						
					</div>

				</div>
			</div>

		</div>
	</div>
</div>




