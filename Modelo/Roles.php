<?php
require 'Conexion.php';

class Roles{
    function buscarRol(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from rol";
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

    public function InsertarRol($rol){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into rol(nombre) values(:rol)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':rol',$rol);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarRol($id_rol){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from rol where id_rol=:id_rol";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_rol',$id_rol);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function ActualizarRol($rol,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update rol set nombre=:rol where id_rol=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':rol',$rol);
        $estado->bindParam(':id',$id);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
?>