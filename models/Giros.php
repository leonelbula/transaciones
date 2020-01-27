<?php

require_once 'config/DataBase.php';

class Giros {
	public  $db;
	
	private $id;
	private $id_usuario;
	private $iddatosbancarios;
	private $fecha;
	private $valor;
	private $estado;
	private $anexo_usuario;
	private $anexo;
	
	function getId() {
		return $this->id;
	}

	function getId_usuario() {
		return $this->id_usuario;
	}

	function getIddatosbancarios() {
		return $this->iddatosbancarios;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getValor() {
		return $this->valor;
	}

	function getEstado() {
		return $this->estado;
	}

	function getAnexo_usuario() {
		return $this->anexo_usuario;
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

	function setIddatosbancarios($iddatosbancarios) {
		$this->iddatosbancarios = $iddatosbancarios;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setValor($valor) {
		$this->valor = $valor;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setAnexo_usuario($anexo_usuario) {
		$this->anexo_usuario = $anexo_usuario;
	}

	function setAnexo($anexo) {
		$this->anexo = $anexo;
	}

	function __construct() {
		$this->db = Database::connect();
	}
	public function listarTransacciones() {		
		$sql = "SELECT * FROM envios WHERE id_usuario = {$this->getId_usuario()} ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function listarTransaccionesPendientes() {		
		$sql = "SELECT e.id ,e.valor, e.estado,e.fecha, d.titular, d.num_cuenta FROM envios e, datos_bancario d WHERE e.id_usuario = {$this->getId_usuario()} AND e.id_datosbancarios = d.id AND e.estado = 1";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function verTransacciones() {		
		$sql = "SELECT e.id ,e.valor, d.titular, d.num_cuenta FROM envios e, datos_bancario d WHERE e.id = {$this->getId()} AND e.id_datosbancarios = d.id";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function verTransaccionesUsuario() {		
		$sql = "SELECT e.id ,e.valor, d.titular, d.num_cuenta FROM envios e, datos_bancario d WHERE e.id = {$this->getId()} AND e.id_datosbancarios = d.id AND e.id_usuario = {$this->getId_usuario()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Ultimatransaccion() {		
		$sql = "SELECT * FROM envios WHERE id_usuario = {$this->getId_usuario()} ORDER BY id DESC LIMIT 1";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Guardar() {
		$sql = "INSERT INTO envios VALUES (NULL,{$this->getId_usuario()},{$this->getIddatosbancarios()},"
		. "'{$this->getFecha()}',{$this->getValor()},{$this->getEstado()},'{$this->getAnexo_usuario()}','{$this->getAnexo()}')";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	public function Estado() {
		$sql = "UPDATE envios SET estado = {$this->getEstado()} WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	public function Comfirmar() {
		$sql = "UPDATE envios SET estado = {$this->getEstado()}, anexo_usuario = '{$this->getAnexo_usuario()}' WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	
}