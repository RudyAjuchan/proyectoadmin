<?php
class Cargar extends Controlador{
    public function Categoria(){
        $consultas=$this->modelo('Categoria');

        $datosCategoria = $consultas->buscarCategoria();
        echo '
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id categoría</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            ';
        if($datosCategoria){            
            foreach($datosCategoria as $DC){
                echo '
                    <tr>
                        <td>'.$DC['id_categoria'].'</td>
                        <td>'.$DC['nombre'].'</td>
                        <td class="text-center">
                            <button onclick="mostrar_msg('.$DC['id_categoria'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            <button id="cargar'.$DC['id_categoria'].'" onclick="cargar('.$DC['id_categoria'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                        </td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }



    public function Autor(){
        $consultas=$this->modelo('Autor');

        $datosAutor = $consultas->buscarAutor();
        echo '
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id Autor</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            ';
        if($datosAutor){            
            foreach($datosAutor as $DC){
                echo '
                    <tr>
                        <td>'.$DC['id_autor'].'</td>
                        <td>'.$DC['nombre'].'</td>
                        <td class="text-center">
                            <button onclick="mostrar_msg('.$DC['id_autor'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            <button id="cargar'.$DC['id_autor'].'" onclick="cargar('.$DC['id_autor'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                        </td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function Editorial(){
        $consultas=$this->modelo('Editorial');

        $datosEditorial = $consultas->buscarEditorial();
        echo '
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id Editorial</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            ';
        if($datosEditorial){            
            foreach($datosEditorial as $DC){
                echo '
                    <tr>
                        <td>'.$DC['id_editorial'].'</td>
                        <td>'.$DC['nombre'].'</td>
                        <td class="text-center">
                            <button onclick="mostrar_msg('.$DC['id_editorial'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            <button id="cargar'.$DC['id_editorial'].'" onclick="cargar('.$DC['id_editorial'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                        </td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }


    public function Pais(){
        $consultas=$this->modelo('Pais');

        $datosPais = $consultas->buscarPais();
        echo '
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id Pais</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            ';
        if($datosPais){            
            foreach($datosPais as $DC){
                echo '
                    <tr>
                        <td>'.$DC['id_pais'].'</td>
                        <td>'.$DC['nombre'].'</td>
                        <td class="text-center">
                            <button onclick="mostrar_msg('.$DC['id_pais'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            <button id="cargar'.$DC['id_pais'].'" onclick="cargar('.$DC['id_pais'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                        </td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function Libros(){
        $consultas=$this->modelo('Libros');

        $datosLibros = $consultas->bsucarLibros();
        echo '
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id Libro</th>
                    <th>Título</th>
                    <th>ISB</th>
                    <th>No pág  </th>
                    <th>Descripción</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Categoría</th>
                    <th>País</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            ';
        if($datosLibros){            
            foreach($datosLibros as $DC){
                echo '
                    <tr>
                        <td>'.$DC['id_libro'].'</td>
                        <td>'.$DC['titulo'].'</td>
                        <td>'.$DC['isbn'].'</td>
                        <td>'.$DC['no_paginas'].'</td>
                        <td>'.$DC['descripcion'].'</td>
                        <td>'.$DC['anio'].'</td>
                        <td>'.$DC['precio'].'</td>
                        <td>'.$DC['nombreautor'].'</td>
                        <td>'.$DC['nombreeditorial'].'</td>
                        <td>'.$DC['nombrecategoria'].'</td>
                        <td>'.$DC['nombrepais'].'</td>
                        <td class="text-center">
                            <button onclick="mostrar_msg('.$DC['id_libro'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            <button id="cargar'.$DC['id_libro'].'" onclick="cargar('.$DC['id_libro'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                        </td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function autorB(){        
        $consultas=$this->modelo('Busquedas');
        $datosAutor = $consultas->buscarAutor();

        if($datosAutor){            
            foreach($datosAutor as $DA){
                echo '<tr>
                    <td>'.$DA['id_autor'].'</td>
                    <td>'.$DA['nombre'].'</td>
                    <td><button type="button" class="btn btn-success btn-sm" onclick="seleccionarAutor('.$DA['id_autor'].','."'".$DA['nombre']."'".')">Seleccionar</button></td>
                </tr>';
            }
        }
    }

    public function editorialB(){        
        $consultas=$this->modelo('Busquedas');
        $datos = $consultas->buscarEditorial();

        if($datos){            
            foreach($datos as $DA){
                echo '<tr>
                    <td>'.$DA['id_editorial'].'</td>
                    <td>'.$DA['nombre'].'</td>
                    <td><button type="button" class="btn btn-success btn-sm" onclick="seleccionarEditorial('.$DA['id_editorial'].','."'".$DA['nombre']."'".')">Seleccionar</button></td>
                </tr>';
            }
        }
    }

    public function categoriaB(){        
        $consultas=$this->modelo('Busquedas');
        $datos = $consultas->buscarCategoria();

        if($datos){            
            foreach($datos as $DA){
                echo '<tr>
                    <td>'.$DA['id_categoria'].'</td>
                    <td>'.$DA['nombre'].'</td>
                    <td><button type="button" class="btn btn-success btn-sm" onclick="seleccionarCategoria('.$DA['id_categoria'].','."'".$DA['nombre']."'".')">Seleccionar</button></td>
                </tr>';
            }
        }
    }

    public function paisB(){        
        $consultas=$this->modelo('Busquedas');
        $datos = $consultas->buscarPais();

        if($datos){            
            foreach($datos as $DA){
                echo '<tr>
                    <td>'.$DA['id_pais'].'</td>
                    <td>'.$DA['nombre'].'</td>
                    <td><button type="button" class="btn btn-success btn-sm" onclick="seleccionarPais('.$DA['id_pais'].','."'".$DA['nombre']."'".')">Seleccionar</button></td>
                </tr>';
            }
        }
    }
}
?>