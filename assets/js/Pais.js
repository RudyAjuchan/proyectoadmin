$(document).ready(function(){
    $("#btnGuardar").show();
    $("#btnActualizar").hide();
})

function reiniciar(){
    $("#btnGuardar").show();
    $("#btnActualizar").hide();
}
function enviarForm() {
    var formData = new FormData(document.getElementById('formP'));    
    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/PaisController/insertar",
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    }).done(function (response) {
        //var mensaje =JSON.parse(response);
        //console.log(response);        
        swal({
            icon: 'success',
            title: 'Atención',
            text: '¡Se ha registrado correctamente!',
        }).then(function () {
            window.location.href = 'http://localhost:8070/proyectoadmin/Page/paises';
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
                formData.append('id_pais', id)
                $.ajax({
                    type: "post",
                    url: "http://localhost:8070/proyectoadmin/PaisController/eliminar",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (response) {
                    var mensaje = JSON.parse(response);
                    //console.log(mensaje);
                    swal({
                        icon: 'success',
                        title: 'Atención',
                        text: 'Se ha eliminado el dato',
                    }).then(function () {
                        window.location.href = 'http://localhost:8070/proyectoadmin/Page/paises';
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
            document.formP.id_pais.value = $(this).html();
        }
        if (conteo == 1) {
            document.formP.nombre.value = $(this).html();
        }


        conteo++;
    });
}


function actualizarForm() {
    var formData = new FormData(document.getElementById('formP'));    
    
    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/PaisController/actualizar",
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
            window.location.href = 'http://localhost:8070/proyectoadmin/Page/paises';
        });
    });
}