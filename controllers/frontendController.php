<?php
require_once 'models/Usuario.php';

class frontendController{
	
	public function index() {
		require_once 'views/layout/header.php';
		require_once 'views/layout/menu.php';		
		require_once 'views/layout/principal.php';
		require_once 'views/layout/footer.php';
		
	}
	public function home() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		require_once 'views/usuario_layout/principal.php';
		require_once 'views/usuario_layout/footer.php';
		
	}
	public function ingreso() {
		require_once 'views/usuario_layout/header.php';	
		require_once 'views/usuario_layout/cabecera.php';	
		require_once 'views/usuario_layout/login.php';
		require_once 'views/usuario_layout/footer.php';
	}
	public function registro() {
		require_once 'views/usuario_layout/header.php';	
		require_once 'views/usuario_layout/cabecera.php';	
		require_once 'views/usuario_layout/registro.php';
		require_once 'views/usuario_layout/footer.php';
	}
	public function restaurarpassword() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/cabecera.php';			
		require_once 'views/usuario_layout/restaurarpasword.php';
		require_once 'views/usuario_layout/footer.php';
	}
	public function login() {
		require_once 'views/usuario_layout/header.php';
		
		if($_POST){
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			$password = isset($_POST['password']) ? $_POST['password']:FALSE;
			
			if(!empty($email) && !empty($password)){
				
				$usuario = new Usuario();
				$usuario->setNombre($email);
				$usuario->setPassword($password);
				
				$identity = $usuario->Login();
				
				if ($identity && is_object($identity)) {
					
					$_SESSION['identity'] = $identity;
				
					if($_SESSION['identity']->estado == 0){
					
						echo'<script>

						swal({
							  type: "success",
							  title: "Acceso exitoso",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "'. URL_BASE .'frontend/home";

								}
							})

						</script>';
						}else{
							echo'<script>

								swal({
									  type: "error",
									  title: "¡Credenciales de acceso incorrectas !",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result){
										if (result.value) {

										window.location = "'. URL_BASE.'frontend/ingreso";

										}
									})

							</script>';
						}				
					
				} else {

					echo'<script>

								swal({
									  type: "error",
									  title: "¡Credenciales de acceso incorrectas !",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result){
										if (result.value) {

										window.location = "'. URL_BASE.'frontend/ingreso";

										}
									})

							</script>';
				}
			}
		}else{
			echo'<script>

								swal({
									  type: "error",
									  title: "¡Credenciales de acceso incorrectas !",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result){
										if (result.value) {

										window.location = "'. URL_BASE.'frontend/ingreso";

										}
									})

							</script>';
		}
	}
	public function salir() {
		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}
		
		//header('Location:'.URL_BASE);
		echo'<script>
				window.location="' . URL_BASE . '";
			</script>';
	}
}

