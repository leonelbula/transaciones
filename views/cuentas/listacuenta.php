<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Cuentas</h1>

	<div class="my-2">
		<a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#Registrarcuenta">
			<span class="icon text-white-50">
				<i class="fas fa-check"></i>
			</span>
			<span class="text">Registrar Cuenta</span>
		</a>
	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Cuentas Registradas</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
                <table class="table table-bordered tablacuentausuario" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Banco</th>
							<th>N° Cuenta</th>
							<th>Tipo</th>
							<th>Titular</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Banco</th>
							<th>N° Cuenta</th>
							<th>Tipo</th>
							<th>Titular</th>
							<th>Acciones</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						$id_usuario = $_SESSION['identity']->id;
						$listacuentas = cuentasController::datosbancario($id_usuario);
						$i = 1;
						while ($row2 = $listacuentas->fetch_object()) :

							$id_banco = $row2->id_banco;
							$datosbanco = bancosController::ListabancosId($id_banco);

							while ($row3 = $datosbanco->fetch_object()) {
								$banco = $row3->nombre;
							}
							?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $banco ?></td>
								<td><?= $row2->num_cuenta ?></td>
								<td><?= $row2->tipo_cuenta ?></td>
								<td><?= $row2->titular ?></td>
								<td><div class="btn-group">

										<button class="btn btn-warning btnEditarCuenta" data-toggle="modal" data-target="#modalEditarCuenta" idcuenta="<?=$row2->id?>"><i class="fa fa-arrow-right"></i> Editar</button>

										<button class="btn btn-danger btnEliminarCuenta" idcuenta="<?=$row2->id?>"><i class="fa fa-trash"></i> Eliminar</button>

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

<div class="modal fade" id="Registrarcuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Cuenta</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= URL_BASE ?>cuentas/guardar" method="POST" >
					<input type="hidden" name="idusuario" value="<?= $_SESSION['identity']->id ?>"/>
					<div class="form-group">
						<label>Banco</label>
						<select class="form-control select2" style="width: 100%;" required name="banco">
							<option>Selecione un banco</option>
							<?php
							$listaBancos = bancosController::Listabancos();
							while ($row = $listaBancos->fetch_object()) :
								?>
								<option value="<?= $row->id ?>"><?= $row->nombre ?></option>
							<?php endwhile; ?>

						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Numero de cuenta</label>
						<input type="number" class="form-control" id="" name="num_cuenta" required placeholder="Numero de cuenta">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Titular</label>
						<input type="text" class="form-control" id="" name="titular" required placeholder="Titular de la Cuenta">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Identificacion</label>
						<input type="number" class="form-control" id="" name="identificacion" required placeholder="Identificacion CC">
					</div>
					<div class="form-group">
						<label>Tipo</label>
						<select class="form-control select2" style="width: 100%;" name="tipo_cuenta" required>
							<option >Selecione una opcion</option>
							<?php
							$listacuentas = bancosController::tiposdecuenta();
							while ($row1 = $listacuentas->fetch_object()) :
								?>
								<option value="<?= $row1->nombre ?>"><?= $row1->nombre ?></option>
							<?php endwhile; ?>

						</select>
					</div>
					<button class="btn btn-primary" type="submit">
						Guardar 
					</button>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

			</div>
		</div>
    </div>
</div>


<div class="modal fade" id="modalEditarCuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Cuenta</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= URL_BASE ?>cuentas/actulizar" method="POST" >
					<input type="hidden" name="idusuario" value="<?= $_SESSION['identity']->id ?>"/>
					<input type="hidden" class="id" name="id" value=""/>
					<div class="form-group">
						<label>Banco</label>
						<select class="form-control select2 seleccionarBancos" style="width: 100%;" required name="banco">
							 <option class="optionEditarCuenta"></option>
							<?php
							$listaBancos = bancosController::Listabancos();
							while ($row = $listaBancos->fetch_object()) :
								?>
								<option value="<?= $row->id ?>"><?= $row->nombre ?></option>
							<?php endwhile; ?>

						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Numero de cuenta</label>
						<input type="number" class="form-control num_cuenta" id="" name="num_cuenta" required placeholder="Numero de cuenta">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Titular</label>
						<input type="text" class="form-control titular" id="" name="titular" required placeholder="Titular de la Cuenta">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Identificacion</label>
						<input type="number" class="form-control identificacion" id="" name="identificacion" required placeholder="Identificacion CC">
					</div>
					<div class="form-group">
						<label>Tipo</label>
						<select class="form-control select2 seleccionarTipoCuenta" style="width: 100%;" name="tipo_cuenta" required>
							 <option class="optionEditarTipoCuenta"></option>
							<?php
							$listacuentas = bancosController::tiposdecuenta();
							while ($row1 = $listacuentas->fetch_object()) :
								?>
								<option value="<?= $row1->nombre ?>"><?= $row1->nombre ?></option>
							<?php endwhile; ?>

						</select>
					</div>
					<button class="btn btn-primary" type="submit">
						Guardar 
					</button>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

			</div>
		</div>
    </div>
</div>

<!-- /.container-fluid -->