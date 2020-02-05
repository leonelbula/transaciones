<?php
require_once 'models/Cuentas.php';

class comentarioController {

	public function index() {
		require_once 'views/usuario_layout/header.php';
		require_once 'views/usuario_layout/menu.php';		
		require_once 'views/comentario/miscomentarios.php';
		require_once 'views/usuario_layout/footer.php';
	}
   
}