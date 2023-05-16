<?php
require 'Controlador.php';

class AutorController extends Controlador{
    public function listarAutor(){
        $consultas = $this->modelo("Autor");
        $datosAutor = $consultas->buscarAutor();

        foreach($datosAutor as $DC){
            echo '
                <tr>
                    <td>'.$DC['id_autor'].'<td>
                    <td>'.$DC['nombre'].'<td>
                    <td>
                        <button onclick="mostrar_msg('.$DC['id_autor'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <button id="cargar'.$DC['id_autor'].'" onclick="cargar('.$DC['id_autor'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                    </td>
                </tr>
            ';
        }
    }

    public function insertar(){
        $nombre = $_POST['nombre'];
        $consultas = $this->modelo("Autor");

        $mensaje = $consultas->insertarAutor($nombre);

        echo json_encode($mensaje);
        return true;
    }

    public function eliminar(){
        $id_autor = $_POST['id_autor'];
        $consultas = $this->modelo("Autor");

        $mensaje = $consultas->eliminarAutor($id_autor);

        echo json_encode($mensaje);
        return true;
    }
    public function actualizar(){        
        $consultas = $this->modelo("Autor");
        $id_autor = $_POST['id_autor'];
        $nombre = $_POST['nombre'];

        $mensaje = $consultas->actualizarAutor($nombre, $id_autor);

        echo json_encode($mensaje);
        return true;
    }
}
?>