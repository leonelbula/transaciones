<!-- Begin Page Content -->
<div class="container-fluid">

	 

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Lista de Transacciones</h1>

	<div class="my-2">
		<a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#RegistrarSolicitud">
			<span class="icon text-white-50">
				<i class="fas fa-check"></i>
			</span>
			<span class="text">Nueva Solicitud</span>
		</a>
	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Solicitudes Registradas</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
                <table class="table table-bordered tablacuentausuario" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Fecha</th>
							<th>Transaccion</th>
							<th>Estado</th>
							<th>Respuesta</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Fecha</th>
							<th>Transaccion</th>
							<th>Estado</th>
							<th>Respuesta</th>							
							
						</tr>
					</tfoot>
					<tbody>
						<?php
						$id_usuario = $_SESSION['identity']->id;
						$listaTransacciones = girosController::ListaSolicitudes($id_usuario);
						$i = 1;
						while ($row2 = $listaTransacciones->fetch_object()) :
						
							?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $row2->fecha ?></td>
								<td><?= $row2->id_envio ?></td>								
								
								<td><div class="btn-group">
										<?php if ($row2->estado == 1) {										
										echo '<a href="#" class="btn btn-secondary btn-icon-split">
										<span class="icon text-white-50">
										  <i class="fas fa-arrow-right"></i>
										</span>
										<span class="text">Valindando</span>
									  </a>';
										}else{
											echo '<a href="" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#confirmarTransaccion">
											<span class="icon text-white-50">
												<i class="fas fa-check"></i>
											</span>
											<span class="text">Procesada</span>
										</a>';
										}?>
									</div>  
								</td>
								
								<td><div class="btn-group">
										
										<?php
										
										if ($row2->respuesta != '') {
												echo '<a href="'.URL_BASE.'giros/verrespuesta&id='.$row2->id.'" class="btn btn-light btn-icon-split">
												<span class="icon text-gray-600">
												  <i class="fas fa-check"></i>
												</span>
												<span class="text">Respuesta</span>
											  </a>';
										} ?>

									

									</div>  
								</td>
							</tr>                    
<?php endwhile; ?>
					</tbody>
                </table>
			</div>
		</div>
	</div>
	  
</div>

<div class="modal fade" id="RegistrarSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Solicitud</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= URL_BASE ?>giros/guardarsolicitud" method="POST" >
					<input type="hidden" name="idUsuario" value="<?= $_SESSION['identity']->id ?>"/>
					<div class="form-group">
						<label>Cuenta a enviar </label>
						<select class="form-control select2" style="width: 100%;" required name="idenvio">
							<option value="">Selecione un Cuenta</option>
							<?php
							$id_usuario = $_SESSION['identity']->id;
							$listaTransacciones = girosController::ListaTransaccionesPendiantes($id_usuario);
							while ($row = $listaTransacciones->fetch_object()) :
								
								?>
								<option value="<?= $row->id ?>"><?= $row->titular ?> - <?= $row->num_cuenta ?></option>
								<?php  endwhile; ?>

						</select>
					</div>
					<div class="form-group">
						<label for="detalles">Detalles</label>
						<textarea class="form-control"  name="detalles" required rows="3">
							
						</textarea>
						
					</div>					

					<center>
						<button class="btn btn-primary" type="submit">
							Generar
						</button>
					</center>

			</div>
			</form>

		</div>
		<div class="modal-footer">

			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

		</div>
	</div>
</div>


<!-- /.container-fluid -->