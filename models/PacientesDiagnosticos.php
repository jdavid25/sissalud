<?php

class PacientesDiagnosticos {
    
    private $id;
    private $paciente_id;
    private $diagnostico_id;
    private $fecha_registro;
    private $estado_id;
    
    public function __construct($id, $paciente_id, $diagnostico_id, $fecha_registro, $estado_id) {
        $this -> id = $id;
        $this -> paciente_id = $paciente_id;
        $this -> diagnostico_id = $diagnostico_id;
        $this -> fecha_registro = $fecha_registro;
        $this -> estado_id = $estado_id;
    }
    
    public function getId() {
        return $this -> id;
    }
    
    public function getPaciente_id() {
        return $this -> paciente_id;
    }
    
    public function getDiagnostico_id() {
        return $this -> diagnostico_id;
    }
    
    public function getFecha_registro() {
        return $this -> fecha_registro;
    }
    
    public function getEstado_id() {
        return $this -> estado_id;
    }
    
    public function setPaciente_id($paciente_id) {
        $this -> paciente_id = $paciente_id;
    }
    
    public function setDiagnostico_id($diagnostico_id) {
        $this -> diagnostico_id = $diagnostico_id;
    }
    
    public function setEstado_id($estado_id) {
        $this -> estado_id = $estado_id;
    }
}