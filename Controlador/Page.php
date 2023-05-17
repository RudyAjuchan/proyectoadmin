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
    public function autores(){
        $this->vista2('pag_autor');
    }
    public function editoriales(){
        $this->vista2('pag_editorial');
    }

    public function paises(){
        $this->vista2('pag_pais');
    }
    public function libros(){
        $this->vista2('pag_libros');
    }
}
?>