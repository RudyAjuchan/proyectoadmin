<?php
require 'Conexion.php';

class Autor{
    function buscarAutor(){
        $modelo= new Conexion();        
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="select * from autor";
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

    public function insertarAutor($nombre){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into autor(nombre) values(:nombre)";
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into autor values(categoria_pk.nextval, :nombre)";
        }
    
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function eliminarAutor($id_autor){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="delete from autor where id_autor0=:id_autor";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_autor',$id_autor);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function actualizarAutor($nombre,$id_autor){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="update autor set nombre=:nombre where id_autor=:id_autor";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':id_autor',$id_autor);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
?>