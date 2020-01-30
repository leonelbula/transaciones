<?php

require_once 'config/DataBase.php';

class DatosEmpresa{
	
	public $db;

		
	public function __construct() {
		$this->db = Database::connect();
	}
	
	public function MostrarInformacion() {
		$sql = "SELECT * FROM datos_empresa ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class DatosConsignacion{
	
	public $db;

		
	public function __construct() {
		$this->db = Database::connect();
	}
	
	public function MostrarInformacion() {
		$sql = "SELECT * FROM datosconsignacion ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}
