<?php
require 'Conexion.php';

class Editorial{
    function buscarEditorial(){
        $modelo= new Conexion();        
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="select * from editorial";
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

    public function insertarEditorial($nombre){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into editorial(nombre) values(:nombre)";
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into editorial values(editorial_pk.nextval, :nombre)";
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

    public function eliminarEditorial($id_editorial){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="delete from editorial where id_editorial=:id_editorial";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_editorial',$id_editorial);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function actualizarEditorial($nombre,$id_editorial){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="update editorial set nombre=:nombre where id_editorial=:id_editorial";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':id_editorial',$id_editorial);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}
?>