<?php
require 'Conexion.php';

class Categoria{
    function buscarCategoria(){
        $modelo= new Conexion();        
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="select * from categoria order by id_categoria asc";
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

    public function insertarCategoria($nombre){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into categoria(nombre) values(:nombre)";
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into categoria values(categoria_pk.nextval, :nombre)";
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

    public function eliminarCategoria($id_categoria){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="delete from categoria where id_categoria=:id_categoria";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_categoria',$id_categoria);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function actualizarCategoria($nombre,$id_categoria){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="update categoria set nombre=:nombre where id_categoria=:id_categoria";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':id_categoria',$id_categoria);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
?>