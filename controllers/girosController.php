<?php
require_once 'models/Giros.php';
require_once 'models/Solicitudes.php';

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
	static public function ListaTransaccionesPendiantes($id_usuario) {
		$giros = new Giros();
		$giros->setId_usuario($id_usuario);
		$detalles = $giros->listarTransaccionesPendientes();
		return $detalles;
	}
	static public function ListaSolicitudes($id_usuario) {
		$solicitud = new Solicitudes();
		$solicitud->setId_usuario($id_usuario);
		$detalles = $solicitud->listarSolicitudes();
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
			
			require_once 'views/giros/procesarpago.php';
		
		} else {
			
		}
			require_once 'views/usuario_layout/footer.php';
	}
	static public function transacionesUsuario($idtran,$idUsuario) {
		
			$giros = new Giros();
			$giros->setId($idtran);
			$giros->setId_usuario($idUsuario);
			$detalles = $giros->verTransaccionesUsuario();
			return $detalles;
	}
	public function confirmar() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		if(isset($_GET['id'])){			
			
			require_once 'views/giros/confirmar.php';
		
		} else {
			
		}
			require_once 'views/usuario_layout/footer.php';
	}
	
	public function confirmarpago() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		if($_POST['id']){
			$id = $_POST['id'];
			$img = isset($_FILES['imagen']) ? $_FILES['imagen']:FALSE;
			if($id && $img){
				$trans = new Giros();
				$estado = 1;
				$trans->setId($id);
				$trans->setEstado($estado);
				
				$file = $_FILES['imagen'];
				$fileNom = $file['name'];
				$type = $file['type'];
				
				$dir = 'image/transaciones';
				
				if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png') {
					
					if(!is_dir($dir)){
						mkdir($dir, 0777,TRUE);
					}
					
					 move_uploaded_file($file['tmp_name'],$dir.'/'.$fileNom);
					
					$trans->setAnexo_usuario($fileNom);
					
				}else{
					$fileNom = "";
					$trans->setAnexo_usuario($fileNom);
				}
				
				$resp = $trans->Comfirmar();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro validado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
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
	
	public function posponer() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$estado = $_POST['estado'];
			$giros = new Giros();
			$giros->setId($id);
			$giros->setEstado($estado);
			$resp = $giros->Estado();
			
			if($resp){
				echo'<script>

					swal({
						  type: "success",
						  title: "Registro Pospuesto correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
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
			
		
		} else {
			
		}
	}
	
	public function solicitudes() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		require_once 'views/giros/listasolicitudes.php';
		require_once 'views/usuario_layout/footer.php';
	}
	public function guardarsolicitud() {
		require_once 'views/usuario_layout/header.php';
		if($_POST['idUsuario']){
			
			$id_usuario = isset($_POST['idUsuario']) ? $_POST['idUsuario']:FALSE;
			$id_envio = isset($_POST['idenvio']) ? $_POST['idenvio']:FALSE;
			$detalles = isset($_POST['detalles']) ? $_POST['detalles']:FALSE;
			
			if($id_usuario && $id_envio){
				$anexo = 'NULL';
				$estado = 1;
				
				$solicitud = new Solicitudes();
				
				$solicitud->setId_usuario($id_usuario);
				$solicitud->setId_Transaccion($id_envio);
				$solicitud->setDetalles($detalles);
				$solicitud->setFecha(date('Y-m-d'));
				$solicitud->setAnexo($anexo);
				$solicitud->setEstado($estado);
				
				$resp = $solicitud->Guardar();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Solicitud generada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "solicitudes";

							}
						})

					</script>';
				}else{
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "solicitudes";

							}
						})

			  	</script>';
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

							window.location = "solicitudes";

							}
						})

			  	</script>';
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

							window.location = "solicitudes";

							}
						})

			  	</script>';
		}
	}
}