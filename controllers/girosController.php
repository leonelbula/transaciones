<?php
require_once 'models/Giros.php';

class girosController {

	public function index() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		require_once 'views/giros/listagiros.php';
		require_once 'views/usuario_layout/footer.php';
	}
	static public function ListaTransacciones($id_usuario) {
		$giros = new Giros();
		$giros->setId_usuario($id_usuario);
		$detalles = $giros->listarTransacciones();
		return $detalles;
	}
	public function guardar() {
		require_once 'views/usuario_layout/header.php';
		if($_POST['idUsuario']){
			$id_usuario = isset($_POST['idUsuario']) ? $_POST['idUsuario']:FALSE;
			$id_datosbancarios = isset($_POST['datosbancarios']) ? $_POST['datosbancarios']:FALSE;
			$valor = isset($_POST['valor']) ? $_POST['valor']:FALSE;
			
			if($id_usuario && $id_datosbancarios && $valor){
				
				$fecha = date('Y-m-d');
				$estado = 2;
				$anexo_usuario = 'NULL';
				$anexo = 'NULL';
				
				$giro = new Giros();
				$giro->setId_usuario($id_usuario);
				$giro->setIddatosbancarios($id_datosbancarios);
				$giro->setValor($valor);
				$giro->setFecha($fecha);
				$giro->setEstado($estado);
				$giro->setAnexo_usuario($anexo_usuario);
				$giro->setAnexo($anexo);
				
				$resp = $giro->Guardar();
				
				$ultimatransaccion = $giro->Ultimatransaccion();
				while ($row = $ultimatransaccion->fetch_object()) {
					$id_transaccion = $row->id;
				}
			
				
				
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro validado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "procesar&id='.$id_transaccion.'";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no validado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
				}
				
				
						
			}
			
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no validado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
	}
	public function procesar() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$giros = new Giros();
			$giros->setId($id);
			$detalles = $giros->verTransacciones();
			
			require_once 'views/giros/procesarpago.php';
		
		} else {
			
		}
			require_once 'views/usuario_layout/footer.php';
	}
}