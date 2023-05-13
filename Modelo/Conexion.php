<?php
class Conexion{
 public function obtener_conexion(){
     $user='root';
     $host='localhost';
     $pass='';
     $db='proy_admon_ti';
     $conexion= new PDO("mysql:host=$host;dbname=$db",$user,$pass);
     return $conexion;
 }

 public function obtener_conexion_oracle(){
    $user='rudy_aj';
    $host='127.0.0.1';
    $port='1521';
    $pass='rajuchan7833';
    $db='BD_adminTI';

    $bd_settings = "
    (DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = ". $host .")(PORT = ". $port ."))
        (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = XE)
        )
    )
    ";

    try{
        $conexion= new PDO('oci:dbname='.$bd_settings, $user, $pass);
        $conexion->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conexión exitosa';
        return $conexion;
    }catch(Exception $e){
        echo 'Error de conexión: '.$e->getMessage();
    }    
}

}
?>