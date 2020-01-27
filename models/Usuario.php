<?php

require_once 'config/DataBase.php';

class Usuario{
	
	private $id;
	private $nombre;
	private $password;
	private $email;
	private $foto; 
	private $verificacion;
	private $emailEncriptado;
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getPassword() {
		return $this->password;
	}

	function getEmail() {
		return $this->email;
	}

	function getFoto() {
		return $this->foto;
	}

	function getVerificacion() {
		return $this->verificacion;
	}

	function getEmailEncriptado() {
		return $this->emailEncriptado;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setPassword($password) {
		$this->password = $this->db->real_escape_string($password);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function setFoto($foto) {
		$this->foto = $this->db->real_escape_string($foto);
	}

	function setVerificacion($verificacion) {
		$this->verificacion = $verificacion;
	}

	function setEmailEncriptado($emailEncriptado) {
		$this->emailEncriptado = $emailEncriptado;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	public function Registro() {
		$sql = "INSERT INTO  usuario VALUES (NULL,'{$this->getNombre()}','{$this->getPassword()}','{$this->getEmail()}',{$this->getVerificacion()},'{$this->getEmailEncriptado()}')";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function VerificarEmail() {
		$sql = "SELECT * FROM usuario WHERE email = '{$this->getEmail()}'";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function VerificarCuenta() {
		$sql = "UPDATE usuario SET verificacion = {$this->getVerificacion()}  WHERE emailEncriptado = '{$this->getEmailEncriptado()}'";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function MostrarUsuario() {
		$sql = "SELECT * FROM usuario WHERE email = '{$this->getEmail()}'";
		$resul = $this->db->query($sql);
		return $resul;
		
	}
	public function Login() {
		$result = FALSE;
		$email = $this->email;
		$password = $this->password;
			
		$sql = "SELECT * FROM usuario WHERE email = '$email'";
		$login = $this->db->query($sql);
		
		if($login && $login->num_rows == 1){
			
			$usuario = $login->fetch_object();
			
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		return $result;
	}
	public function EditarPerfil() {
		$sql = "UPDATE usuario SET nombre='{$this->getNombre()}',password='{$this->getPassword()}',email='{$this->getEmail()}' WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	
}


