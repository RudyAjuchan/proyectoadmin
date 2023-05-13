<?php 
require 'Conexion.php';
class Usuarios{
    public function InsertarUsuario($nombre, $email, $password){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into usuario(nombre, email, password) values(:nombre, :email, :password)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':email',$email);
        $estado->bindParam(':password',$password);
       // $estado->bindParam(':confirmpassword',$confirmpassword);
    
    
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    function buscarUsuario(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="SELECT * FROM usuario";
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

    public function insertarVerificacion($numVerificacion, $id_usuario){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update usuario set cod_verificacion=:numVerificacion where id_usuario=:id_usuario";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':numVerificacion',$numVerificacion);
        $estado->bindParam(':id_usuario',$id_usuario);
    
    
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    function buscarCodigoVerificar($id_usuario){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="SELECT cod_verificacion FROM usuario WHERE id_usuario=:id_usuario";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_usuario',$id_usuario);
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

?>