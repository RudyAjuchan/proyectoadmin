<?php
session_start();
if ($_SESSION["AdmTI_nombre"] == "" || $_SESSION["AdmTI_nombre"] == null) {
    header("Location: http://localhost:8070/proyectoadmin/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Confirmar</title>
</head>
<body style="height: 100vh;">
    
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Código de verificación</h2>
                        <p>Te hemos enviado a tu correo de verificación, introduce el código para continuar</p>
                        <form action="" class="text-center" id="form-verificar">
                            <input name="cod_verificar" type="number" class="form-control" placeholder="-- -- --">
                            <button type="button" class="btn btn-dark mt-3" onclick="verificar();">Continuar</button>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="../assets/js/Usuario.js"></script>
</body>
</html>