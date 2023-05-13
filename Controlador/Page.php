<?php
require 'Controlador.php';
Class Page extends Controlador{
    public function aux(){
        $this->vista2('pag_login');
    }
    public function inicio(){
        $this->vista2('pag_inicio');
    }
    public function verificar(){
        $this->vista2('pag_confirmar');
    }
}
?>