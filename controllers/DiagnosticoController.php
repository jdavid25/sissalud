<?php

include_once 'Conexion.php';
include_once dirname(__FILE__).'./../models/Diagnostico.php';

class DiagnosticoController {
    
    public static function getAll(){
        $con = Conexion::iniciar();
        $diagnosticos = [];
        $res = $con->query("SELECT * FROM diagnosticos WHERE estado_id != 2");
        while($item = mysqli_fetch_assoc($res)) {
            $diagnosticos[] = new Diagnostico($item["id"], $item["codigo"], $item["detalle"], $item["fecha_registro"], $item["estado_id"]);
        }
        return $diagnosticos;
    }

    public static function getById($id){
        $con = Conexion::iniciar();
        $diagnostico = null;
        $res = $con->query("SELECT * FROM diagnosticos WHERE id = '$id'");
        while($item = mysqli_fetch_assoc($res)) {
            $diagnostico = new Diagnostico($item["id"], $item["codigo"], $item["detalle"], $item["fecha_registro"], $item["estado_id"]);
        }
        return $diagnostico;
    }

    public static function create($codigo, $detalle){
        $con = Conexion::iniciar();
        $result = $con->query("INSERT INTO diagnosticos (codigo, detalle, fecha_registro) VALUES ('$codigo', '$detalle', NOW())");
        return $result;
        
    }

    public static function update($id, $codigo, $detalle){
        $con = Conexion::iniciar();
        $result = $con->query("UPDATE diagnosticos SET codigo = '$codigo', detalle = '$detalle' WHERE id = '$id'");
        return $result;
        
    }

    public static function changeState($id, $state){
        $con = Conexion::iniciar();
        $result = $con->query("UPDATE diagnosticos SET estado_id = '$state' WHERE id = '$id'");
        return $result;
    }
}