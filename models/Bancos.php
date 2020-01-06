<?php

require_once 'config/DataBase.php';

class Bancos{
	
	public $db;
	private $id_banco;
	
	function getId_banco() {
		return $this->id_banco;
	}

	function setId_banco($id_banco) {
		$this->id_banco = $id_banco;
	}

	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	public function ListarBancos() {
		$sql = "SELECT * FROM bancos";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function ListarBancosId() {
		$sql = "SELECT * FROM bancos WHERE id = {$this->getId_banco()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TiposCuentas() {
		$sql = "SELECT * FROM tipo_cuenta";
		$resul = $this->db->query($sql);
		return $resul;
	}
}