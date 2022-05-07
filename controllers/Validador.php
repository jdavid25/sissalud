<?php

abstract class Validador {

	protected $aviso_inicio;
	protected $aviso_cierre;	
	
	protected $text;
	protected $documento;
	
	protected $error;

	function __construct() {		
	}

	protected function variable_iniciada($variable) {
		if (isset($variable) && !empty($variable)) {
			return true;
		} else {
			return false;
		}
	}
	
	protected function validar_documento($conexion, $documento) {
		if (!$this -> variable_iniciada($documento)) {
			return "Debes ingresar este campo";
		} else {
			$this -> documento = $documento;
		}
		
		if (RepositorioEntrada :: documento_existe($documento)) {
			return "Ya existe este número de documento.";
		}
	}
	
	protected function validar_text($conexion, $text) {
		if (!$this -> variable_iniciada($text)) {
			return "Debes ingresar este campo";
		} else {
			$this -> text = $text;
		}
	}
	
	public function getText() {
		return $this -> text;
	}

	public function getDocumento() {
		return $this -> documento;
	}
	
	public function mostrar_error() {
		if ($this -> error != "") {
			echo $this -> aviso_inicio . $this -> error . $this -> aviso_cierre;
		}
	}
	
	public function mostrar_error_url() {
		if ($this -> error_url != "") {
			echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;
		}
	}
	
	public function mostrar_error_texto() {
		if ($this -> error_texto != "") {
			echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;
		}
	}
	
	public function entrada_valida() {
		if ($this -> error_titulo == "" && $this -> error_url == "" && $this -> error_texto == "") {
			return true;
		} else {
			return false;
		}
	}
}