<?php
require 'Conexion.php';

class Pruebas{
    public function pruebita(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion_oracle();
        $sql="SELECT * FROM autor";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(!isset($rows)){
            $rows=null;
        }
        return $rows;
    }
}