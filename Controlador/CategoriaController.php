<?php
require 'Controlador.php';

class CategoriaController extends Controlador{
    public function listarCategoria(){
        $consultas = $this->modelo("Categoria");
        $datosCategoria = $consultas->buscarCategoria();

        foreach($datosCategoria as $DC){
            echo '
                <tr>
                    <td>'.$DC['id_categoria'].'<td>
                    <td>'.$DC['nombre'].'<td>
                    <td>
                        <button onclick="mostrar_msg('.$DC['id_categoria'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <button id="cargar'.$DC['id_categoria'].'" onclick="cargar('.$DC['id_categoria'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                    </td>
                </tr>
            ';
        }
    }

    public function insertar(){
        $nombre = $_POST['nombre'];
        $consultas = $this->modelo("Categoria");

        $mensaje = $consultas->insertarCategoria($nombre);

        echo json_encode($mensaje);
        return true;
    }

    public function eliminar(){
        $id_categoria = $_POST['id_categoria'];
        $consultas = $this->modelo("Categoria");

        $mensaje = $consultas->eliminarCategoria($id_categoria);

        echo json_encode($mensaje);
        return true;
    }
    public function actualizar(){        
        $consultas = $this->modelo("Categoria");
        $id_categoria = $_POST['id_categoria'];
        $nombre = $_POST['nombre'];

        $mensaje = $consultas->actualizarCategoria($nombre, $id_categoria);

        echo json_encode($mensaje);
        return true;
    }
}
?>