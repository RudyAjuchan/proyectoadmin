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
}
?>