<?php
require "encabezado.php";
?>

<div class="container h-100">
    <div class="row justify-content-center align-items-center h-100 mx-auto">
        <div class="col-md-12 text-center">
            <h3>Seleccione el motor de bd</h3>
            <select name="tipoConexion" id="tipoConexion" class="form-control" onchange="definirTipoBD();">
            <option value="" disabled selected hidden>Seleccione</option>
            <?php
                if(isset($_SESSION['AdmTI_tipoBD'])){
                    if($_SESSION['AdmTI_tipoBD']==1){
                        echo '<option value="1" selected>SQL</option>';
                        echo '<option value="2">Oracle</option>';
                    }else if($_SESSION['AdmTI_tipoBD']==2){
                        echo '<option value="1">SQL</option>';
                        echo '<option value="2" selected>Oracle</option>';
                    }
                }else{
                    echo '<option value="1">SQL</option>';
                    echo '<option value="2">Oracle</option>';
                }                
            ?>
            </select>
        </div>
    </div>
</div>

<?php
require "pie.php";
?>
<script src="../assets/js/Inicio.js"></script>