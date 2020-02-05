<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Cuentas</h1>

	<div class="my-2">
		<a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#Registrarcomentario">
			<span class="icon text-white-50">
				<i class="fas fa-check"></i>
			</span>
			<span class="text">Registrar Comentario</span>
		</a>
	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Comentarios Registradas</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
                <table class="table table-bordered tablacuentausuario" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Comentario</th>							
							
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Comentario</th>							
							
						</tr>
					</tfoot>
					<tbody>
						
							<tr>
								<td></td>							
								<td></td>							
								<td> 
								</td>
							</tr>                    
						
					</tbody>
                </table>
			</div>
		</div>
	</div>

</div>

<div class="modal fade" id="Registrarcomentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Comentarios</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= URL_BASE ?>cuentas/guardar" method="POST" >
					<input type="hidden" name="idusuario" value="<?= $_SESSION['identity']->id ?>"/>							
					
					<div class="form-group">
						<label for="exampleInputPassword1">Comentarios</label>
                  <textarea class="form-control" name="detalles" rows="3"></textarea>
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
