<?php


require 'Controlador.php';
class Usuarios_Controller extends Controlador{
    public function usuario(){
        $consultas=$this->modelo('Usuarios');
        $nombreU=$_POST['nombre'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        //$confirmpassword=$_POST['confirmpassword'];
  
        $mensaje=$consultas->InsertarUsuario($nombreU,$email,$password);
        echo json_encode($mensaje);
        return true;
    }
}
?>