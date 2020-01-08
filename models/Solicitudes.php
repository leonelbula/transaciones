<?php

require_once 'config/DataBase.php';

class Solicitudes {
	public  $db;
	
	private $id;
	private $id_usuario;	
	private $id_Transaccion;
	private $fecha;	
	private $detalles;
	private $estado;	
	private $anexo;
	
	function getId() {
		return $this->id;
	}

	function getId_usuario() {
		return $this->id_usuario;
	}

	function getId_Transaccion() {
		return $this->id_Transaccion;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getDetalles() {
		return $this->detalles;
	}

	function getEstado() {
		return $this->estado;
	}

	function getAnexo() {
		return $this->anexo;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setId_usuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	function setId_Transaccion($id_Transaccion) {
		$this->id_Transaccion = $id_Transaccion;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setDetalles($detalles) {
		$this->detalles = $detalles;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setAnexo($anexo) {
		$this->anexo = $anexo;
	}

	
			
	function __construct() {
		$this->db = Database::connect();
	}
	public function listarSolicitudes() {		
		$sql = "SELECT * FROM solicitudes WHERE id_usuario = {$this->getId_usuario()} AND estado = 1";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Guardar() {
		$sql = "INSERT INTO solicitudes VALUES (NULL,{$this->getId_usuario()},{$this->getId_Transaccion()},'{$this->getFecha()}','{$this->getDetalles()}',{$this->getEstado()},'{$this->getAnexo()}')";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
}

