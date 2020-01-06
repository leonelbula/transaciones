<?php

require_once 'config/DataBase.php';

class Cuentas {
	public  $db;
	
	private $id;
	private $id_usuario;
	private $id_banco;
	private $num_cuenta;
	private $titular;
	private $cedula;
	private $tipo;
	
	function getId() {
		return $this->id;
	}

	function getId_usuario() {
		return $this->id_usuario;
	}

	function getId_banco() {
		return $this->id_banco;
	}

	function getNum_cuenta() {
		return $this->num_cuenta;
	}

	function getTitular() {
		return $this->titular;
	}

	function getCedula() {
		return $this->cedula;
	}

	function getTipo() {
		return $this->tipo;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setId_usuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	function setId_banco($id_banco) {
		$this->id_banco = $id_banco;
	}

	function setNum_cuenta($num_cuenta) {
		$this->num_cuenta = $num_cuenta;
	}

	function setTitular($titular) {
		$this->titular = $titular;
	}

	function setCedula($cedula) {
		$this->cedula = $cedula;
	}

	function setTipo($tipo) {
		$this->tipo = $tipo;
	}

				
	function __construct() {
		$this->db = Database::connect();
	}
	public function listarCuentas() {		
		$sql = "SELECT * FROM datos_bancario WHERE id_usuario = {$this->getId_usuario()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function listarCuentasId() {		
		$sql = "SELECT * FROM datos_bancario WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Guardar() {
		$sql = "INSERT INTO datos_bancario VALUES (NULL,{$this->getId_usuario()},{$this->getId_banco()},{$this->getNum_cuenta()},"
		. "'{$this->getTitular()}',{$this->getCedula()},'{$this->getTipo()}')";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	public function Actulizar() {
		$sql = "UPDATE datos_bancario SET id_banco={$this->getId_banco()},num_cuenta={$this->getNum_cuenta()},"
		. "titular='{$this->getTitular()}',cedula={$this->getCedula()},tipo_cuenta='{$this->getTipo()}' WHERE id = {$this->getId()} AND id_usuario = {$this->getId_usuario()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	public function Eliminar() {
		$sql = "DELETE FROM datos_bancario WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		$respt = FALSE;
		
		if($resul){
			$respt = TRUE;
		}
		return $respt;
	}

}