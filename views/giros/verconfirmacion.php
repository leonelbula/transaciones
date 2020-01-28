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
								<div class="form-group">
									<label>Anexo de usuario</label>
									<img src="<?=URL_BASE?>image/transaciones/<?=$row->anexo_usuario?>" class="img-fluid" height="400px" width="300px" />
								</div>
								<hr>
								<div class="form-group">
									<label>Anexo de Confirmacion</label>
									<img src="<?=URL_BASE?>image/transaciones/<?=$row->anexo?>" class="img-fluid" height="400px" width="300px" />
								</div>
								<?php endwhile; ?>
								
							</div>

						
					</div>

				</div>
			</div>

		</div>
	</div>
</div>




