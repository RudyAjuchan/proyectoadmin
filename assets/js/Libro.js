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
            window.location.href = 'http://localhost:8070/proyectoadmin/Page/libros';
        });
    });
}

function mostrar_msg(id) {
    swal({
        title: "¿Está seguro eliminar el dato",
        text: "Esta acción es irreversible",
        icon: "warning",
        buttons: {
            confirm: { text: 'Si deseo eliminarlo', className: 'sweet-warning' },
            cancel: 'Cancelar'
        },
        dangerMode: true
    })
        .then((willDelete) => {
            if (willDelete) {
                var formData = new FormData();
                formData.append('id_autor', id)
                $.ajax({
                    type: "post",
                    url: "http://localhost:8070/proyectoadmin/AutorController/eliminar",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (response) {
                    console.log(response);
                    var mensaje = JSON.parse(response);
                    //console.log(mensaje);
                    swal({
                        icon: 'success',
                        title: 'Atención',
                        text: 'Se ha eliminado el dato',
                    }).then(function () {
                        window.location.href = 'http://localhost:8070/proyectoadmin/Page/autores';
                    });
                });
            } else {
                swal("No se eliminó el dato");
            }
        });
}

function cargar(id) {
    $("#btnGuardar").hide();
    $("#btnActualizar").show();
    var conteo = 0;
    $("#cargar" + id).parents("tr").find("td").each(function () {

        if (conteo == 0) {
            document.formA.id_autor.value = $(this).html();
        }
        if (conteo == 1) {
            document.formA.nombre.value = $(this).html();
        }


        conteo++;
    });
}


function actualizarForm() {
    var formData = new FormData(document.getElementById('formA'));    
    
    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/AutorController/actualizar",
        data: formData,        
        contentType: false,
        processData: false

    }).done(function (response) {
        console.log(response);
        swal({
            icon: 'success',
            title: 'Atención',
            text: 'Se ha actualizado correctamente',
        }).then(function () {            
            window.location.href = 'http://localhost:8070/proyectoadmin/Page/autores';
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