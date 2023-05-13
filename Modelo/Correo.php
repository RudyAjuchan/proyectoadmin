<?php
require 'funciones.php';

Class Correo{
    public function enviarCorreoU($mensaje, $nombreUsuario, $correoUsuario){
        $destino = array($correoUsuario => $nombreUsuario);
		$asunto = 'Código de verificación';
		$mensaje=enviarMail($destino,$asunto,$mensaje);
		return $mensaje;
    }
}
?>