<?php
require_once 'models/Bancos.php';

class bancosController{
	
	static public function Listabancos() {
		$bancos = new Bancos();
		$detalles = $bancos->ListarBancos();
		return $detalles;
	}
	static public function ListabancosId($id_banco) {
		$bancos = new Bancos();
		$bancos->setId_banco($id_banco);
		$detalles = $bancos->ListarBancosId();
		return $detalles;
	}
	static public function tiposdecuenta() {
		$bancos = new Bancos();
		$detalles = $bancos->TiposCuentas();
		return $detalles;
	}
	
}