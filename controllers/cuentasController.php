<?php
require_once 'models/Cuentas.php';

class cuentasController {

	public function index() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		require_once 'views/cuentas/listacuenta.php';
		require_once 'views/usuario_layout/footer.php';
	}
	static public function datosbancario($id_usuario) {
		$datoscancario = new Cuentas();
		$datoscancario->setId_usuario($id_usuario);
		$detalles = $datoscancario->listarCuentas();
		return $detalles;
	}
	static public function datosbancarioid($id) {
		$datoscancario = new Cuentas();
		$datoscancario->setId($id);
		$detalles = $datoscancario->listarCuentasId();
		return $detalles;
	}
	public function guardar() {
		require_once 'views/usuario_layout/header.php';
		if(isset($_POST['idusuario']) && !empty($_POST['idusuario'])){
			
			$id_usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : FALSE;
			$id_banco = isset($_POST['banco']) ? $_POST['banco'] : FALSE;
			$num_cuenta = isset($_POST['num_cuenta']) ? $_POST['num_cuenta'] : FALSE;
			$titular = isset($_POST['titular']) ? $_POST['titular'] : FALSE;
			$identificacion = isset($_POST['identificacion']) ? $_POST['identificacion'] : FALSE;
			$tipocuenta = isset($_POST['tipo_cuenta']) ? $_POST['tipo_cuenta'] : FALSE;
			
			if($id_usuario && $id_banco && $num_cuenta && $titular && $identificacion && $tipocuenta){
				
				$cuenta = new Cuentas;
				$cuenta->setId_usuario($id_usuario);
				$cuenta->setId_banco($id_banco);
				$cuenta->setNum_cuenta($num_cuenta);
				$cuenta->setTitular($titular);
				$cuenta->setCedula($identificacion);
				$cuenta->setTipo($tipocuenta);
				
				$resp = $cuenta->Guardar();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro Guardado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cliente";

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

							window.location = "index";

							}
						})

			  	</script>';
				}
						
				
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
			}
			
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
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
	public function actulizar() {
		require_once 'views/usuario_layout/header.php';
		if(isset($_POST['id']) && isset($_POST['idusuario']) && !empty($_POST['idusuario'])){
			
			$id = isset($_POST['id']) ? $_POST['id'] : FALSE;
			$id_usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : FALSE;
			$id_banco = isset($_POST['banco']) ? $_POST['banco'] : FALSE;
			$num_cuenta = isset($_POST['num_cuenta']) ? $_POST['num_cuenta'] : FALSE;
			$titular = isset($_POST['titular']) ? $_POST['titular'] : FALSE;
			$identificacion = isset($_POST['identificacion']) ? $_POST['identificacion'] : FALSE;
			$tipocuenta = isset($_POST['tipo_cuenta']) ? $_POST['tipo_cuenta'] : FALSE;
			
			if($id && $id_usuario && $id_banco && $num_cuenta && $titular && $identificacion && $tipocuenta){
				
				$cuenta = new Cuentas;
				$cuenta->setId($id);
				$cuenta->setId_usuario($id_usuario);
				$cuenta->setId_banco($id_banco);
				$cuenta->setNum_cuenta($num_cuenta);
				$cuenta->setTitular($titular);
				$cuenta->setCedula($identificacion);
				$cuenta->setTipo($tipocuenta);
				
				$resp = $cuenta->Actulizar();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro Editado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cliente";

							}
						})

					</script>';
				}else{
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Editado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
				}
						
				
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Editado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
			}
			
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Editado !",
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
	public function eliminarcuenta() {
		require_once 'views/usuario_layout/header.php';
		if($_GET['id']){
			$id = $_GET['id'];
			$cuenta = new Cuentas();
			$cuenta->setId($id);
			$resp = $cuenta->Eliminar();
			
			if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro Eliminado Correctamente",
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
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
				}
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
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
}
