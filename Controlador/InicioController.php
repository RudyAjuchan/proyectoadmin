<?php
require 'Controlador.php';

class InicioController extends Controlador{
    public function definirBD($tipoBD){
        session_start();
        $_SESSION['AdmTI_tipoBD'] = $tipoBD;
        echo json_encode($tipoBD);
        return true;
    }
}
?>