<?php
require 'Conexion.php';

class Pais{
    function buscarPais(){
        $modelo= new Conexion();        
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="select * from pais";
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

    public function insertarPais($nombre){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into pais(nombre) values(:nombre)";
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into pais values(pais_pk.nextval, :nombre)";
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

    public function eliminarPais($id_pais){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="delete from pais where id_pais=:id_pais";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_pais',$id_pais);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function actualizarPais($nombre,$id_pais){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="update pais set nombre=:nombre where id_pais=:id_pais";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':id_pais',$id_pais);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
?>