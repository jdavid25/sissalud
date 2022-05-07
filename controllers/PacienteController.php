<?php

include_once 'Conexion.php';
include_once 'C:\projects\xampp\htdocs\sissalud\models\Paciente.php';

class PacienteController {
    
    public static function getAll(){
        $con = Conexion::iniciar();
        $pacientes = [];
        $res = $con->query("SELECT * FROM pacientes WHERE estado_id != 2");
        while($item = mysqli_fetch_assoc($res)) {
            $pacientes[] = new Paciente($item["id"], $item["nombres"], $item["apellidos"], $item["tipo_documento"],$item["num_documento"],$item["direccion"], $item["telefono"], $item["fecha_registro"], $item["estado_id"]);
        }
        return $pacientes;
    }

    public static function getById($id){
        $con = Conexion::iniciar();
        $paciente = null;
        $res = $con->query("SELECT * FROM pacientes WHERE id = '$id'");
        while($item = mysqli_fetch_assoc($res)) {
            $paciente = new Paciente($item["id"], $item["nombres"], $item["apellidos"], $item["tipo_documento"],$item["num_documento"],$item["direccion"], $item["telefono"], $item["fecha_registro"], $item["estado_id"]);
        }
        return $paciente;
    }

    public static function create($nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono){
        $con = Conexion::iniciar();
        $result = $con->query("INSERT INTO pacientes (nombres, apellidos, tipo_documento, num_documento, direccion, telefono, fecha_registro) VALUES ('$nombres', '$apellidos', '$tipo_documento', '$num_documento', '$direccion', '$telefono', NOW())");
        return $con->insert_id;   
    }

    public static function getByNum_documento($doc){
        $con = Conexion::iniciar();
        $paciente = null;
        $res = $con->query("SELECT * FROM pacientes WHERE num_documento = '$doc'");
        while($item = mysqli_fetch_assoc($res)) {
            $paciente = new Paciente($item["id"], $item["nombres"], $item["apellidos"], $item["tipo_documento"],$item["num_documento"],$item["direccion"], $item["telefono"], $item["fecha_registro"], $item["estado_id"]);
        }
        return $paciente;
    }

    public static function update($id, $nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono){
        $con = Conexion::iniciar();
        $result = $con->query("UPDATE pacientes SET nombres = '$nombres', apellidos = '$apellidos', tipo_documento = '$tipo_documento', direccion = '$direccion', telefono = '$telefono' WHERE id = '$id'");
        return $result;        
    }

    public static function changeState($id, $state){
        $con = Conexion::iniciar();
        $result = $con->query("UPDATE pacientes SET estado_id = '$state' WHERE id = '$id'");
        return $result;
    }
}