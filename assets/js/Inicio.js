function definirTipoBD(){
    var tipoBD = document.getElementById("tipoConexion").value;

    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/InicioController/definirBD/"+tipoBD,
        data: null,
        cache: false,
        contentType: false,
        processData: false

    }).done(function (response) {   
        console.log(response);     
        swal({
            icon: 'success',
            title: 'Atención',
            text: '¡Se ha registrado correctamente!',
        }).then(function () {	        
                window.location.href='http://localhost:8070/proyectoadmin/page/inicio';					
        }); 

    });
}