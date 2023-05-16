<?php
require 'Controlador.php';
require 'Cargar.php';
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
    public function categorias(){
        $this->vista2('pag_categoria');
    }
}
?>