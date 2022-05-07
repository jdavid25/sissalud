<?php

class Paciente {
    
    private $id;
    private $nombres;
    private $apellidos;
    private $tipo_documento;
    private $num_documento;
    private $direccion;
    private $telefono;
    private $fecha_registro;
    private $estado_id;
    
    public function __construct($id, $nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono, $fecha_registro,$estado_id) {
        $this -> id = $id;
        $this -> nombres = $nombres;
        $this -> apellidos = $apellidos;
        $this -> tipo_documento = $tipo_documento;
        $this -> num_documento = $num_documento;
        $this -> direccion = $direccion;
        $this -> telefono = $telefono;
        $this -> fecha_registro = $fecha_registro;
        $this -> estado_id = $estado_id;
    }
    
    public function getId() {
        return $this -> id;
    }
    
    public function getNombres() {
        return $this -> nombres;
    }
    
    public function getApellidos() {
        return $this -> apellidos;
    }
    
    public function getTipo_documento() {
        return $this -> tipo_documento;
    }
    
    public function getNum_documento() {
        return $this -> num_documento;
    }
    
    public function getDireccion() {
        return $this -> direccion;
    }

    public function getTelefono() {
        return $this -> telefono;
    }

    public function getFecha_registro() {
        return $this -> fecha_registro;
    }

    public function getEstado_id() {
        return $this -> estado_id;
    }

    public function setNombres($nombres) {
        $this -> nombres = $nombres;
    }
    
    public function setApellidos($apellidos) {
        $this -> apellidos = $apellidos;
    }
    
    public function setTipo_documento($tipo_documento) {
        $this -> tipo_documento = $tipo_documento;
    }
    
    public function setNum_documento($num_documento) {
        $this -> num_documento = $num_documento;
    }

    public function setDireccion($direccion) {
        $this -> direccion = $direccion;
    }

    public function setTelefono($telefono) {
        $this -> telefono = $telefono;
    }

    public function setEstado_id($estado_id) {
        $this -> estado_id = $estado_id;
    }
}