<?php
session_start();
if ($_SESSION["AdmTI_verificar"] == "" || $_SESSION["AdmTI_verificar"] == null) {
    header("Location: http://localhost:8070/proyectoadmin/");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/cdb.min.css" />
    <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>

<body>

    <div class="sidebar" role="cdb-sidebar">
        <div class="sidebar-container">
            <div class="sidebar-header justify-content-between px-4">
                <a class="sidebar-brand">Admón TI</a>
                <a class="sidebar-toggler" onclick="ajustar();"><i class="fa fa-bars"></i></a>
            </div>
            <div class="sidebar-nav">
                <div class="sidenav">
                    <a class="sidebar-item" href="#">
                        <div class="sidebar-item-content">
                            <i class="fa-solid fa-book"></i>
                            <span>Libros</span>
                        </div>
                    </a>
                </div>
                <div class="sidebar-footer">
                    <a class="sidebar-item" href="http://localhost:8070/proyectoadmin/Cerrar_session/cerrar">
                        <div class="sidebar-item-content">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Cerrar Sesión</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="contenido-principal py-5 h-100">