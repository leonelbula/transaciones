<?php
require_once '../config/DataBase.php';

class ListaBancos {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarBancoId($id) {
		$sql = "SELECT * FROM bancos WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul->fetch_object();
	}
	
}

class AjaxBancos{
	
	public $idbanco;
	
	public function MostrarBancoId() {
		$id = $this->idbanco;
		$banco = new ListaBancos();
		$respuesta = $banco->MostrarBancoId($id);
		echo json_encode($respuesta);
	}

}
if(isset($_POST["idbanco"])){

  $banco = new AjaxBancos();
  $banco -> idbanco = $_POST["idbanco"];
  $banco ->MostrarBancoId();

}