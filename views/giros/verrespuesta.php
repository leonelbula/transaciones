<div class="container-fluid">

	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Respuesta a solicitud</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">




				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Respuesta a solicitud</h5>

					</div>

					<div class="card-body">
						<div class="card-body col-6" role="document">
							<div class="form-group">									
									<img src="<?=URL_BASE?>image/logo/logocolcambios" class="img-fluid" height="400px" width="300px" />
								</div>
							<?php 
							$id = $_GET['id'];
							$idUsuario = $_SESSION['identity']->id;
							$detalles = girosController::RespuestaUsuario($id, $idUsuario);
							while ($row = $detalles->fetch_object()):
								
								?>
								
								<div class="form-group">
									<textarea class="form-control" rows="6" readonly><?=$row->respuesta?></textarea>
								</div>
								
								<?php endwhile; ?>
								
							</div>

						
					</div>

				</div>
			</div>

		</div>
	</div>
</div>