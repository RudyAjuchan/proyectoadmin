<?php
require 'Controlador.php';

class Verificar extends Controlador
{
    public function usuario()
    {
        $consultas = $this->modelo('Usuarios');
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $incorrecto = false;
        $filas = $consultas->buscarUsuario();

        if ($filas) {
            foreach ($filas as $fila) {
                if (($email == $fila['email']) && ($pass == $fila['password'])) {

                    session_set_cookie_params(60 * 60 * 8);
                    session_start();
                    $_SESSION['AdmTI_id_usuario'] = $fila['id_usuario'];
                    $_SESSION['AdmTI_nombre'] = $fila['nombre'];
                    $_SESSION['AdmTI_email'] = $fila['email'];
                    // $_SESSION['AdmTI_nombreRol']=$fila['rol'];
                    //$_SESSION['AdmTI_modulos']=$consultas->buscarModulos($fila['id_rol']);
                    $mensaje = 'Bienvenido';
                    $incorrecto = false;                    

                    echo json_encode($mensaje);
                    return true;
                } else {
                    $incorrecto = true;
                }
            }
        } else {
            $mensaje = 'No hay usuarios registrados';
            echo json_encode($mensaje);
            return true;
        }

        if ($incorrecto == true) {
            $mensaje = 'Usuario o Contraseña incorrecta';
            echo json_encode($mensaje);
            return true;
        }
    }


    public function codigo(){
        $consultas = $this->modelo('Usuarios');
        session_start();
        $filas = $consultas->buscarCodigoVerificar($_SESSION['AdmTI_id_usuario']);

        if($filas){
            foreach($filas as $F){
                if($F['cod_verificacion']==$_POST['cod_verificar']){
                    $_SESSION['AdmTI_verificar']="Ok"; 
                    echo json_encode("OK");
                    return true;
                }else{
                    echo json_encode("ERROR");
                    return true;
                }
            }
        }
    }
}
