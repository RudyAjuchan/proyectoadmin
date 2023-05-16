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
}
?>