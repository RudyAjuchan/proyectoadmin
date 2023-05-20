<?php
require 'Controlador.php';

class GraficasController extends Controlador{
    public function libros(){
        $consultas = $this->modelo("Libros");
        $datosLibros = $consultas->bsucarLibros2();

        if($datosLibros){
            echo json_encode($datosLibros);
        }        
    }

    public function librosPorCategoria($id_categoria){
        $consultas = $this->modelo("Libros");
        $datosLibros = $consultas->bsucarLibrosPorCategoria($id_categoria);

        if($datosLibros){
            echo json_encode($datosLibros);
        }
    }
}
?>