<?php
require 'Controlador.php';

class Cerrar_session extends Controlador{
    public function cerrar(){
        session_start();
        unset($_SESSION['AdmTI_id_usuario']);
        unset($_SESSION['AdmTI_nombre']);
        unset($_SESSION['AdmTI_email']);
        unset($_SESSION['AdmTI_verificar']);
        header("Location: http://localhost:8070/proyectoadmin/");
    }
}
?>