<?php
require 'Controlador.php';

class PaisController extends Controlador{
    public function listarPais(){
        $consultas = $this->modelo("Pais");
        $datosPais = $consultas->buscarPais();

        foreach($datosPais as $DC){
            echo '
                <tr>
                    <td>'.$DC['id_pais'].'<td>
                    <td>'.$DC['nombre'].'<td>
                    <td>
                        <button onclick="mostrar_msg('.$DC['id_pais'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <button id="cargar'.$DC['id_pais'].'" onclick="cargar('.$DC['id_pais'].')"; class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-user-edit"></i></button>
                    </td>
                </tr>
            ';
        }
    }

    public function insertar(){
        $nombre = $_POST['nombre'];
        $consultas = $this->modelo("Pais");

        $mensaje = $consultas->insertarPais($nombre);

        echo json_encode($mensaje);
        return true;
    }

    public function eliminar(){
        $id_pais = $_POST['id_pais'];
        $consultas = $this->modelo("Pais");

        $mensaje = $consultas->eliminarPais($id_pais);

        echo json_encode($mensaje);
        return true;
    }
    public function actualizar(){        
        $consultas = $this->modelo("Pais");
        $id_pais = $_POST['id_pais'];
        $nombre = $_POST['nombre'];

        $mensaje = $consultas->actualizarPais($nombre, $id_pais);

        echo json_encode($mensaje);
        return true;
    }
}
?>