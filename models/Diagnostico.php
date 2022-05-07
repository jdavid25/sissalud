<?php

class Diagnostico {
    
    private $id;
    private $codigo;
    private $detalle;
    private $fecha_registro;
    private $estado_id;
    
    public function __construct($id, $codigo, $detalle, $fecha_registro, $estado_id) {
        $this -> id = $id;
        $this -> codigo = $codigo;
        $this -> detalle = $detalle;
        $this -> fecha_registro = $fecha_registro;
        $this -> estado_id = $estado_id;
    }
    
    public function getId() {
        return $this -> id;
    }
    
    public function getCodigo() {
        return $this -> codigo;
    }
    
    public function getDetalle() {
        return $this -> detalle;
    }
    
    public function getFecha_registro() {
        return $this -> fecha_registro;
    }
    
    public function getEstado_id() {
        return $this -> estado_id;
    }
    
    public function setCodigo($codigo) {
        $this -> codigo = $codigo;
    }
    
    public function setDetalle($detalle) {
        $this -> detalle = $detalle;
    }
    
    public function setEstado_id($estado_id) {
        $this -> estado_id = $estado_id;
    }
}