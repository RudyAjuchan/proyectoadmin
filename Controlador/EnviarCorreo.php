<?php
require 'Controlador.php';

class EnviarCorreo extends Controlador{
    public function verificar(){

        //INICIO VERIFICACIÓN
        session_start();
        $consultas = $this->modelo('Usuarios');
        $numeroVerificacion = rand(100000,999999);
        $consultas->insertarVerificacion($numeroVerificacion, $_SESSION['AdmTI_id_usuario']);
        $consultas2=$this->modelo('Correo');
        $destino=$_SESSION['AdmTI_email'];
        $nombre=$_SESSION['AdmTI_nombre'];
        $mensaje2 = "Estimado(a) ".$nombre." se le proporciona un código de verificación, si usted no inició sesión ignorelo <br><br>";
        $mensaje2 .= "No comparta con nadie este código <br><br>";        
        $mensaje2 .= "<span style='font-size: 1.3rem;'>".$numeroVerificacion."<span>";        
        $resultado=$consultas2->enviarCorreoU($mensaje2, $nombre, $destino);
        echo json_encode("enviado");        
        return true;
        //FIN VERIFICACIÓN
    }
}
?>