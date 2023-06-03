<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motoro BD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="height: 100vh;">
    <div class="row justify-content-center px-4 py-4 align-items-center h-100">
        <div class="col-md-12 text-center">
            <h3>Seleccione el motor de bd</h3>
            <p>Antes de continuar seleccione el tipo de conexión que se usará en la plataforma</p>
            <p>Ya dentro de la aplicación podrá volver a cambiar el tipo de conexión</p>
            <select name="tipoConexion" id="tipoConexion" class="form-control" onchange="definirTipoBD();">
                <option value="" disabled selected hidden>Seleccione</option>
                <?php
                if (isset($_SESSION['AdmTI_tipoBD'])) {
                    if ($_SESSION['AdmTI_tipoBD'] == 1) {
                        echo '<option value="1" selected>SQL</option>';
                        echo '<option value="2">Oracle</option>';
                    } else if ($_SESSION['AdmTI_tipoBD'] == 2) {
                        echo '<option value="1">SQL</option>';
                        echo '<option value="2" selected>Oracle</option>';
                    }
                } else {
                    echo '<option value="1">SQL</option>';
                    echo '<option value="2">Oracle</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="../assets/js/Inicio.js"></script>
</body>

</html>