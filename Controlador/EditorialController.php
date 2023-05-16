<?php
require 'Controlador.php';

class EditorialController extends Controlador{
    public function listarEditorial(){
        $consultas = $this->modelo("Editorial");
        $datosEditorial = $consultas->buscarEditorial();

        foreach($datosEditorial as $DC){
            echo '
                <tr>
                    <td>'.$DC['id_editorial'].'<td>
                    <td>'.$DC['nombre'].'<td>
                    <td>
                        <button onclick="mostrar_msg('.$DC['id_editorial'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <button id="cargar'.$DC['id_editorial'].'" onclick="cargar('.$DC['id_editorial'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                    </td>
                </tr>
            ';
        }
    }

    public function insertar(){
        $nombre = $_POST['nombre'];
        $consultas = $this->modelo("Editorial");

        $mensaje = $consultas->insertarEditorial($nombre);

        echo json_encode($mensaje);
        return true;
    }

    public function eliminar(){
        $id_editorial = $_POST['id_editorial'];
        $consultas = $this->modelo("Editorial");

        $mensaje = $consultas->eliminarEditorial($id_editorial);

        echo json_encode($mensaje);
        return true;
    }
    public function actualizar(){        
        $consultas = $this->modelo("Editorial");
        $id_editorial = $_POST['id_editorial'];
        $nombre = $_POST['nombre'];

        $mensaje = $consultas->actualizarEditorial($nombre, $id_editorial);

        echo json_encode($mensaje);
        return true;
    }
}
?>