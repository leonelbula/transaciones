<div class="container-fluid">

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Volante  Transacciones</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">




				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Volante para pago</h5>

					</div>

					<div class="card-body">
						<div class="card-body col-6" role="document">
							<div class="form-group">									
									<img src="<?=URL_BASE?>image/logo/logocolcambios" class="img-fluid" height="400px" width="300px" />
								</div>
							<?php 
							$idtran = $_GET['id'];
							$idUsuario = $_SESSION['identity']->id;
							$detalles = girosController::transacionesUsuario($idtran, $idUsuario);
							while ($row = $detalles->fetch_object()):
								?>
								<input type="hidden" name="idusuario" value="<?= $_SESSION['identity']->id ?>"/>
								<div class="form-group">
									<label>Destinatario: </label>
									<input type="text" class="form-control"  name="cuenta" value="<?= $row->titular ?> --Cuenta: <?= $row->num_cuenta ?>" required readonly />
								</div>
								<div class="form-group">
									<label>Valor:</label>
									<input type="text" class="form-control"  name="valor" value="<?= number_format($row->valor) ?>" required readonly />
								</div>
								<div class="form-group">
									
								</div>
								<hr>
								<div class="form-group">
									<?php 
									$datos = homeController::DatosConfignacion();
									while ($row1 = $datos-> fetch_object()) :
										
										
									?>
									<h4>Identificacion o Referencia </h4>
									<h4>N°:<strong><?=$row1->numero?> </strong></h4>
									<h4>Titular </h4>
									<h4> <strong><?=$row1->nombre?></strong></h4><br>
									<?php endwhile; ?>
								</div>
								<?php endwhile; ?>
								<button type="button" class="btn btn-secondary" onclick="javascript:window.print()">Imprimir</button>
							</div>

						
					</div>

				</div>
			</div>

		</div>
	</div>
</div>