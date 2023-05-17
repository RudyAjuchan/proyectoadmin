<?php
require 'Controlador.php';

class LibroController extends Controlador{
    public function insertar(){
        $consultas = $this->modelo("Libros");

        $titulo = $_POST['titulo'];
        $isbn = $_POST['isbn'];
        $no_paginas = $_POST['no_paginas'];
        $descripcion = $_POST['descripcion'];
        $anio = $_POST['anio'];
        $precio = $_POST['precio'];

        if($_POST['id_autor']!=""){
            $id_autor=$_POST['id_autor'];
        }else{            
            $id_autor = $consultas->insertarAutor($_POST['nombreAutor']);
        }        

        if($_POST['id_editorial']!=""){
            $id_editorial=$_POST['id_editorial'];
        }else{            
            $id_editorial = $consultas->insertarEditorial($_POST['nombreEditorial']);
        }

        if($_POST['id_categoria']!=""){
            $id_categoria=$_POST['id_categoria'];
        }else{            
            $id_categoria = $consultas->insertarCategoria($_POST['nombreCategoria']);
        }

        if($_POST['id_pais']!=""){
            $id_pais=$_POST['id_pais'];
        }else{            
            $id_pais = $consultas->insertarPais($_POST['nombrePais']);
        }

        $mensaje = $consultas->insertarLibro($titulo, $isbn, $no_paginas, $descripcion, $anio, $precio, $id_autor, $id_editorial, $id_categoria, $id_pais);

        echo json_encode($mensaje);
        return true;
    }
}
?>