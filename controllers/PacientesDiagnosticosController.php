<?php

include_once 'Conexion.php';
include_once dirname(__FILE__).'./../models/PacientesDiagnosticos.php';

class PacientesDiagnosticosController {
    
    public static function getAll(){
        $con = Conexion::iniciar();
        $pacientes_diagnosticos = [];
        $res = $con->query("SELECT * FROM pacientes_diagnosticos WHERE estado_id != 2");
        while($item = mysqli_fetch_assoc($res)) {
            $pacientes_diagnosticos[] = new PacientesDiagnosticos($item["id"], $item["paciente_id"], $item["diagnostico_id"], $item["fecha_registro"], $item["estado_id"]);
        }
        return $pacientes_diagnosticos;
    }

    public static function create($paciente_id, $diagnostico_id){
        $con = Conexion::iniciar();
        $result = $con->query("INSERT INTO pacientes_diagnosticos (paciente_id, diagnostico_id) VALUES ('$paciente_id', '$diagnostico_id')");
        return $result;
        
    }

    public static function changeState($id, $state){
        $con = Conexion::iniciar();
        $result = $con->query("UPDATE solicitud_saldo SET estado_id = '$state' WHERE id = '$id'");
        // echo state;
        if($state == 6){
            $result = $con->query("SELECT * FROM solicitud_saldo WHERE id = '$id'");
            $solicitud = $result->fetch_assoc();
            $usuario_id = $solicitud['usuario_id'];
            $cantidad = $solicitud['cantidad'];
            $result = $con->query("UPDATE usuario SET saldo = saldo + '$cantidad' WHERE id = '$usuario_id'");    
        }
        return $result;
    }
}