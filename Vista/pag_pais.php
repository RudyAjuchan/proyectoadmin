<?php
require 'encabezado.php';
?>

<div class="container px-5">
    <div class="row">
        <h3>Paises</h3>
        <div class="col-md-12">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalId">
            Nuevo
        </button><br><br>
            <?php
                $Cargar = new Cargar();
                $Cargar->Pais();
            ?>
        </div>
    </div>
</div>


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Paises</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reiniciar();"></button>
            </div>
            <div class="modal-body">
                <form action="" name="formP" id="formP">
                    <input type="hidden" name="id_pais" id="id_pais">
                    <div class="icono">
                        <i class="fas fa-key"></i>
                        <input type="text" name="nombre" id="nombre" class="form-control ps-5 mt-3" placeholder="Escriba el nombre">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="enviarForm();" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-primary" onclick="actualizarForm();" id="btnActualizar">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="reiniciar();">Close</button>                
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<!-- <script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script> -->

<?php
require 'pie.php';
?>

<script src="../assets/js/Pais.js"></script>