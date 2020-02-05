<?php
require_once 'models/Usuario.php';
require_once 'models/Parametro.php';
require_once 'models/Contenido.php';
//require_once "extenciones/PHPMailer/PHPMailerAutoload.php";

class homeController{
	
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
	static public function DatosConfignacion() {
		$datos = new DatosConsignacion();
		$detalles = $datos->MostrarInformacion();
		return $detalles;
	}
	static public function Contenido() {
		$datos = new Contenido();
		$detalles = $datos->MostrarContenido();
		return $detalles;
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
				$usuario->setEmail($email);
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

								window.location = "'. URL_BASE .'home/home";

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

										window.location = "'. URL_BASE.'home/ingreso";

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

										window.location = "'. URL_BASE.'home/ingreso";

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

										window.location = "'. URL_BASE.'home/ingreso";

										}
									})

							</script>';
		}
	}
	
	public function registrousuario() {
		if($_POST){
			$regUsuario = isset($_POST['regUsuario']) ? $_POST['regUsuario']:FALSE;
			$regEmail = isset($_POST['regEmail']) ? $_POST['regEmail']:FALSE;
			$regPassword = isset($_POST['regPassword']) ? $_POST['regPassword']:FALSE;
			
			
			if($regUsuario && $regEmail && $regPassword){
				$encriptarEmail = md5($regEmail);
				$Password =  password_hash($regPassword, PASSWORD_BCRYPT, ['cost' => 4]);
				
				$verificacion = 0;
				$user = new Usuario();
				$user->setNombre($regEmail);
				$user->setEmail($regEmail);
				$user->setPassword($Password);				
				$user->setVerificacion($verificacion);
				$user->setEmailEncriptado($encriptarEmail);
				$resp = $user->VerificarEmail();				
				
				
				if($resp->num_rows > 0){
					echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡El correo ' . $_POST["regEmail"]. 'se encuentra registrado !",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';
				} else {

					$resul = $user->Registro();
					
					if ($resul) {
						
					date_default_timezone_set("America/Bogota");

				
					$mail = new PHPMailer;

					$mail->CharSet = 'UTF-8';

					$mail->isMail();

					$mail->setFrom('soporte@sopote.com', 'Soporte.com');

					$mail->addReplyTo('soporte@sopote.com', 'Soporte.com');

					$mail->Subject = "Por favor verifique su dirección de correo electrónico";

					$mail->addAddress($_POST["regEmail"]);

					$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
						
						<center>
							
							<img style="padding:20px; width:10%" src="http://www.tutorialesatualcance.com/tienda/logo.png">

						</center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
						
							<center>
							
							<img style="padding:20px; width:15%" src="http://www.tutorialesatualcance.com/tienda/icon-email.png">

							<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

							<hr style="border:1px solid #ccc; width:80%">

							<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta de Tienda Virtual, debe confirmar su dirección de correo electrónico</h4>

							<a href="'.URL_BASE.'home/verificar&id='.$encriptarEmail.'" target="_blank" style="text-decoration:none">

							<div style="line-height:60px; background:#0aa; width:60%; color:white">Verifique su dirección de correo electrónico</div>

							</a>

							<br>

							<hr style="border:1px solid #ccc; width:80%">

							<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

							</center>

						</div>

					</div>');

					$envio = $mail->Send();

					if(!$envio){

						echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

					}else{

						echo '<script> 

							swal({
								  title: "¡OK!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

					}

				

					} else {
						echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al registrar el usuario",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';
					}
				}
			}
			
		}

	}
	
	public function verificar() {
		if(isset($_GET['id'])){
			$valor = $_GET['id'];
			$verificacion = 1;
			$user = new Usuario();
			$user->setEmailEncriptado($valor);
			$user->setVerificacion($verificacion);
			$resul = $user->VerificarCuenta();
						
			require_once 'views/layout/cabecera.php';			
			require_once 'views/layout/menu.php';
			require_once 'views/usuarios/verificar.php';
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

