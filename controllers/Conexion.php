<?php

class Conexion {

    public static $servername = "localhost";
    public static $database = "sissalud";
    public static $username = "root";
    public static $password = "";
    public static $con = null;

    public static function iniciar(){
        self::$con = mysqli_connect(self::$servername, self::$username, self::$password, self::$database);
        // Check connection
        if (!self::$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return self::$con;
    }

    public static function getConexion(){
        return self::$con;
    }

    public static function isConectado(){
        if(self::$con){
            return true;
        }
        return false;
    }

    public static function cerrar(){
        mysqli_close(self::$con);
    }
}