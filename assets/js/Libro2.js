$(document).ready(function(){
    $("#btnGuardar").show();
    $("#btnActualizar").hide();

    $(".content-search").fadeOut();
    var buscador = $("#table_search").DataTable();
    $("#input-search").keyup(function () {
    buscador.search($(this).val()).draw();
    if ($("#input-search").val() == "") {
        $(".content-search").fadeOut();
    } else {
        $(".content-search").fadeIn();
    }
    });

    $(".content-search2").fadeOut();
    var buscador = $("#table_search2").DataTable();
    $("#input-search2").keyup(function () {
    buscador.search($(this).val()).draw();
    if ($("#input-search2").val() == "") {
        $(".content-search2").fadeOut();
    } else {
        $(".content-search2").fadeIn();
    }
    });

    $(".content-search3").fadeOut();
    var buscador = $("#table_search3").DataTable();
    $("#input-search3").keyup(function () {
    buscador.search($(this).val()).draw();
    if ($("#input-search3").val() == "") {
        $(".content-search3").fadeOut();
    } else {
        $(".content-search3").fadeIn();
    }
    });

    $(".content-search4").fadeOut();
    var buscador = $("#table_search4").DataTable();
    $("#input-search4").keyup(function () {
    buscador.search($(this).val()).draw();
    if ($("#input-search4").val() == "") {
        $(".content-search4").fadeOut();
    } else {
        $(".content-search4").fadeIn();
    }
    });
})

function quitarBusqueda(){
    $(".content-search").fadeOut();
}
function quitarBusqueda2(){
    $(".content-search2").fadeOut();
}
function quitarBusqueda3(){
    $(".content-search3").fadeOut();
}
function quitarBusqueda4(){
    $(".content-search4").fadeOut();
}

function reiniciar(){
    $("#btnGuardar").show();
    $("#btnActualizar").hide();
}
function enviarForm() {
    var formData = new FormData(document.getElementById('formA'));    
    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/LibroController/insertar",
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    }).done(function (response) {
        //var mensaje =JSON.parse(response);
        console.log(response);        
        swal({
            icon: 'success',
            title: 'Atención',
            text: '¡Se ha registrado correctamente!',
        }).then(function () {
            var myModalEl = document.querySelector('#modalId')
            var modal = bootstrap.Modal.getOrCreateInstance(myModalEl)
            modal.hide();                        
            printCharts();
        });
    });
}
function seleccionarAutor(id, nombre){
    $("#id_autor").val(id);
    $("#input-search").val(nombre);
}

function seleccionarEditorial(id, nombre){
    $("#id_editorial").val(id);
    $("#input-search2").val(nombre);
}

function seleccionarCategoria(id, nombre){
    $("#id_categoria").val(id);
    $("#input-search3").val(nombre);
}

function seleccionarPais(id, nombre){
    $("#id_pais").val(id);
    $("#input-search4").val(nombre);
}