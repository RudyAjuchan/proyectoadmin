function enviar_usuario() {
    var formData = new FormData(document.getElementById('form-loginL'));
    //$('#loading-screen').css('display','block');
    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/Usuarios_Controller/usuario",
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    }).done(function (response) {        
        swal({
            icon: 'success',
            title: 'Atención',
            text: '¡Se ha registrado correctamente!',
        }).then(function () {	        
                window.location.href='http://localhost:8070/proyectoadmin/';					
        }); 

    });
}


function ingresar_usuario(){

    var formData= new FormData(document.getElementById('form-login'));
    //$('#loading-screen').css('display','block');
    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/Verificar/usuario",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
        
    }).done(function(response){
            var mensaje =JSON.parse(response);
            //$('#loading-screen').css('display','none');     
            if(mensaje=="Usuario o Contraseña incorrecta"){
                swal({
                    title: 'Atención',
                    text: "Usuario o contraseña incorrecta",
                    icon: 'error'
                }).then(function () {	        
                        window.location.href='http://localhost:8070/proyectoadmin';					
                });
            }
            if(mensaje=="Bienvenido"){
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8070/proyectoadmin/EnviarCorreo/verificar",
                }).done(function(response2){                    
                    swal({
                        title: 'Atención',
                        text: mensaje,
                        icon: 'success'
                    }).then(function () {	        
                            window.location.href='http://localhost:8070/proyectoadmin/Page/verificar';					
                    });
                });
                
            }                   
                                          
    });
    //console.log("si pasa");
}

function verificar(){
    var formData = new FormData(document.getElementById('form-verificar'));
    //$('#loading-screen').css('display','block');
    $.ajax({
        type: "POST",
        url: "http://localhost:8070/proyectoadmin/Verificar/codigo",
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    }).done(function (response) {
        var mensaje = JSON.parse(response);
        if(mensaje=="OK"){
            swal({
                icon: 'success',
                title: 'Atención',
                text: '¡Bienvenido!',
            }).then(function () {	        
                    window.location.href='http://localhost:8070/proyectoadmin/page/inicio';					
            }); 
        }else if(mensaje=="ERROR"){
            swal({
                icon: 'warning',
                title: 'Atención',
                text: 'El código es incorrecto!',
            });
        }                

    });
}