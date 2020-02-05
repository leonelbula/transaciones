<?php

require_once 'config/DataBase.php';

class Contenido{
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	public function MostrarContenido() {
		$sql = "SELECT * FROM contenido";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}