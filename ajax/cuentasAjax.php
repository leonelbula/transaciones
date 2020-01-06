<?php
require_once '../config/DataBase.php';

class ListaCuentas {
	
	public $db;
	


	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarCuentasId($id) {
		$sql = "SELECT * FROM datos_bancario WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul->fetch_object();
	}
	
}

class AjaxCuentas{
	
	public $idCuenta;
	
	public function MostrarCuentaId() {
		$id = $this->idCuenta;
		$cuenta = new ListaCuentas();
		$respuesta = $cuenta->MostrarCuentasId($id);
		echo json_encode($respuesta);
	}

}
if(isset($_POST["idCuenta"])){

  $Cuenta = new AjaxCuentas();
  $Cuenta -> idCuenta = $_POST["idCuenta"];
  $Cuenta ->MostrarCuentaId();

}