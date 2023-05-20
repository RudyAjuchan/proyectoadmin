<?php
require "encabezado.php";
?>

<div class="container h-100 px-5 py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalId">Nuevo Libro</button>
        </div>
        <div class="col-md-4 text-center content-grafica m-3 py-3 px-4">
            <figure>
                <h2>Libros por Categoría</h2>
                <canvas id="porCategoria"></canvas>
            </figure>
        </div>
        <div class="col-md-7 content-grafica m-3 text-center py-3">
            <figure>
                <h2>Libros por Año</h2>
                <canvas id="porYear"></canvas>
            </figure>
        </div>

        <div class="col-md-7 text-center content-grafica m-3 py-3 px-4">
            <figure>
                <h2>Libros por Autor</h2>
                <canvas id="porAutor"></canvas>
            </figure>
        </div>

        <div class="col-md-4 text-center content-grafica m-3 py-3 px-4">
            <figure>
                <h2>Páginas de libros</h2>
                <select name="select_categorias" id="select_categorias" class="form-control">
                    <?php
                        $Cargar = new Cargar();
                        $Cargar->selectCategorias();
                    ?>
                </select>
                <canvas id="porPaginas"></canvas>
            </figure>
        </div>
        

        <div class="col-md-4 text-center content-grafica m-3 py-3 px-4">
            <figure>
                <h2>Libros por Editorial</h2>
                <canvas id="porEditorial"></canvas>
            </figure>
        </div>

        <div class="col-md-7 text-center content-grafica m-3 py-3 px-4">
            <figure>
                <h2>Libros por Pais</h2>
                <canvas id="porPais"></canvas>
            </figure>
        </div>
    </div>
</div>



<!-- PARA AGREGAR LIBRO -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Libros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reiniciar();"></button>
            </div>
            <div class="modal-body">
                <form action="" name="formA" id="formA">
                    <input type="hidden" name="id_libro" id="id_libro">
                    <div class="icono">
                        <i class="fas fa-key"></i>
                        <input type="text" name="titulo" id="titulo" class="form-control ps-5 mt-3" placeholder="Escriba el titulo">
                    </div>
                    <div class="icono">
                        <i class="fas fa-key"></i>
                        <input type="number" name="isbn" id="isbn" class="form-control ps-5 mt-3" placeholder="Escriba el ISBN">
                    </div>
                    <div class="icono">
                        <i class="fas fa-key"></i>
                        <input type="number" name="no_paginas" id="no_paginas" class="form-control ps-5 mt-3" placeholder="Escriba el número de páginas">
                    </div>
                    <div class="icono">
                        <!-- <label for="" class="mt-3">Descripción</label> -->
                        <textarea name="descripcion" id="" cols="30" rows="5" placeholder="Escriba la descripción" class="form-control mt-3"></textarea>
                    </div>
                    <div class="icono">
                        <i class="fas fa-key"></i>
                        <input type="number" name="anio" id="anio" class="form-control ps-5 mt-3" placeholder="Escriba el Año">
                    </div>
                    <div class="icono">
                        <i class="fas fa-key"></i>
                        <input type="number" name="precio" id="precio" class="form-control ps-5 mt-3" placeholder="Escriba el Precio">
                    </div>

                    <!-- Para la búsqueda -->
                    <input type="hidden" name="id_autor" id="id_autor">
                    <Label class="float-start mt-4">Buscar Autor:</Label>
                    <input type="search" id="input-search" name="nombreAutor" onblur="quitarBusqueda()" placeholder="Buscar aqui" class="form-control">
                    <div class="content-search">
                        <div class="content-table">
                            <table id="table_search" class="table">
                                <thead>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Autor</th>                                        
                                        <th>Acción</th>                              
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php
                                        $Cargar->autorB();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Para la búsqueda -->


                    <!-- Para la búsqueda -->
                    <input type="hidden" name="id_editorial" id="id_editorial">
                    <Label class="float-start mt-4">Buscar Editorial:</Label>
                    <input type="search" id="input-search2" name="nombreEditorial" onblur="quitarBusqueda2()" placeholder="Buscar aqui" class="form-control">
                    <div class="content-search2">
                        <div class="content-table">
                            <table id="table_search2" class="table">
                                <thead>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Editorial</th>                                        
                                        <th>Acción</th>                              
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php
                                        $Cargar->editorialB();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Para la búsqueda -->


                    <!-- Para la búsqueda -->
                    <input type="hidden" name="id_categoria" id="id_categoria">
                    <Label class="float-start mt-4">Buscar Categoria:</Label>
                    <input type="search" id="input-search3" name="nombreCategoria" onblur="quitarBusqueda3()" placeholder="Buscar aqui" class="form-control">
                    <div class="content-search3">
                        <div class="content-table">
                            <table id="table_search" class="table">
                                <thead>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Categoria</th>                                        
                                        <th>Acción</th>                              
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php
                                        $Cargar->categoriaB();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Para la búsqueda -->

                    <!-- Para la búsqueda -->
                    <input type="hidden" name="id_pais" id="id_pais">
                    <Label class="float-start mt-4">Buscar País:</Label>
                    <input type="search" id="input-search4" name="nombrePais" onblur="quitarBusqueda4()" placeholder="Buscar aqui" class="form-control">
                    <div class="content-search4">
                        <div class="content-table">
                            <table id="table_search" class="table">
                                <thead>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Pais</th>                                        
                                        <th>Acción</th>                              
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php
                                        $Cargar->paisB();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Para la búsqueda -->
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
<!-- PARA AGREGAR LIBRO -->
<?php
require "pie.php";
?>
<script src="../assets/js/helpers.js"></script>
<script src="../assets/js/Graficas.js"></script>
<script src="../assets/js/Libro2.js"></script>