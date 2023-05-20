<?php
require 'Conexion.php';

class Libros{
    function bsucarLibros(){
        $modelo= new Conexion();                
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="SELECT l.id_libro, l.titulo, l.isbn, l.no_paginas, l.no_paginas, l.descripcion, l.anio, l.precio,
        a.nombre as nombreautor, e.nombre as nombreeditorial,
        c.nombre as nombrecategoria, p.nombre as nombrepais, 
        a.id_autor, e.id_editorial, c.id_categoria, p.id_pais FROM libro l 
        INNER JOIN autor a ON a.id_autor=l.id_autor
        INNER JOIN editorial e ON e.id_editorial=l.id_editorial
        INNER JOIN categoria c ON c.id_categoria=l.id_categoria
        INNER JOIN pais p ON p.id_pais= l.id_pais";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(!isset($rows)){
            $rows=null;
        }
        return $rows;
    }

    function bsucarLibros2(){
        $modelo= new Conexion();        
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="SELECT l.id_libro, l.titulo, l.isbn, l.no_paginas, l.no_paginas, l.descripcion, l.anio, l.precio,
        a.nombre as nombreautor, e.nombre as nombreeditorial,
        c.nombre as nombrecategoria, p.nombre as nombrepais, 
        a.id_autor, e.id_editorial, c.id_categoria, p.id_pais FROM libro l 
        INNER JOIN autor a ON a.id_autor=l.id_autor
        INNER JOIN editorial e ON e.id_editorial=l.id_editorial
        INNER JOIN categoria c ON c.id_categoria=l.id_categoria
        INNER JOIN pais p ON p.id_pais= l.id_pais";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(!isset($rows)){
            $rows=null;
        }
        return $rows;
    }

    function bsucarLibrosPorCategoria($id_categoria){
        $modelo= new Conexion();        
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="SELECT l.id_libro, l.titulo, l.no_paginas, c.nombre as nombrecategoria FROM libro l
        INNER JOIN categoria c ON c.id_categoria=l.id_categoria
        WHERE l.id_categoria=:id_categoria";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_categoria',$id_categoria);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(!isset($rows)){
            $rows=null;
        }
        return $rows;
    }

    public function insertarLibro($titulo, $isbn, $no_paginas, $descripcion, $anio, $precio, $id_autor, $id_editorial, $id_categoria, $id_pais){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into libro(titulo, isbn, no_paginas, descripcion, anio, precio, id_autor, id_editorial, id_categoria, id_pais) 
            values(:titulo, :isbn, :no_paginas, :descripcion, :anio, :precio, :id_autor, :id_editorial, :id_categoria, :id_pais)";
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into libro values(categoria_pk.nextval, :titulo, :isbn, :no_paginas, :descripcion, :anio, :precio, :id_autor, :id_editorial, :id_categoria, :id_pais)";
        }
    
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':titulo',$titulo);
        $estado->bindParam(':isbn',$isbn);
        $estado->bindParam(':no_paginas',$no_paginas);
        $estado->bindParam(':descripcion',$descripcion);
        $estado->bindParam(':anio',$anio);
        $estado->bindParam(':precio',$precio);
        $estado->bindParam(':id_autor',$id_autor);
        $estado->bindParam(':id_editorial',$id_editorial);
        $estado->bindParam(':id_categoria',$id_categoria);
        $estado->bindParam(':id_pais',$id_pais);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return "Datos guardados";
        }
    }

    public function insertarPais($nombre){
        $id=0;
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into pais(nombre) values(:nombre)";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $conexion->lastInsertId();
            }
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into pais values(pais_pk.nextval, :nombre) returning id_pais into :id";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);
            $estado->bindParam(':id',$id,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $id;
            }
        }
    }

    public function eliminarPais($id_pais){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="delete from pais where id_pais=:id_pais";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_pais',$id_pais);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    public function actualizarPais($nombre,$id_pais){
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();            
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();            
        }
        $sql="update pais set nombre=:nombre where id_pais=:id_pais";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':id_pais',$id_pais);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function insertarAutor($nombre){
        $id=0;
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into autor(nombre) values(:nombre)";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $conexion->lastInsertId();
            }
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into autor values(autor_pk.nextval, :nombre) returning id_autor into :id";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);
            $estado->bindParam(':id',$id,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $id;
            }
        }        
        
    }

    public function insertarCategoria($nombre){
        $id=0;
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into categoria(nombre) values(:nombre)";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $conexion->lastInsertId();
            }
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into categoria values(categoria_pk.nextval, :nombre) returning id_categoria into :id";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);
            $estado->bindParam(':id',$id,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $id;
            }
        }
    }

    public function insertarEditorial($nombre){
        $id=0;
        $modelo= new Conexion();
        session_start();
        if($_SESSION['AdmTI_tipoBD']==1){
            $conexion=$modelo->obtener_conexion();
            $sql="insert into editorial(nombre) values(:nombre)";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $conexion->lastInsertId();
            }
        }else if($_SESSION['AdmTI_tipoBD']==2){
            $conexion=$modelo->obtener_conexion_oracle();
            $sql="insert into editorial values(editorial_pk.nextval, :nombre) returning id_editorial into :id";
            $estado=$conexion->prepare($sql);
            $estado->bindParam(':nombre',$nombre);
            $estado->bindParam(':id',$id,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);

            if(!$estado){
                return 'Error al guardar';
            }else{
                $estado->execute();
                return $id;
            }
        }
    }
}
?>