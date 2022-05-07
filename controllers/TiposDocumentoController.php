<?php

include_once 'Conexion.php';
include_once dirname(__FILE__).'./../models/TiposDocumento.php';

class TiposDocumentoController {
    
    public static function getAll(){
        $con = Conexion::iniciar();
        $tipos_documento = [];
        $res = $con->query("SELECT * FROM tipos_documento WHERE estado_id != 2");
        while($item = mysqli_fetch_assoc($res)) {
            $tipos_documento[] = new TiposDocumento($item["id"], $item["detalle"], $item["fecha_registro"], $item["estado_id"]);
        }
        return $tipos_documento;
    }

    public static function create($nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono){
        $con = Conexion::iniciar();
        $result = $con->query("INSERT INTO pacientes (nombres, apellidos, tipo_documento, num_documento, direccion, telefono, fecha_registro) VALUES ('$nombres', '$apellidos', '$tipo_documento', '$num_documento', '$direccion', '$telefono', NOW())");
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