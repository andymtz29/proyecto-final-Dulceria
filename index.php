<?php 
    require_once "./app/config/dependencias.php";
    session_start();
    require_once "./app/config/rutas.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS.'b5.css'?>">
    <link rel="stylesheet" href="<?=CSS.'navbar.css'?>">
    <link rel="stylesheet" href="<?=CSS.'login.css'?>">
    <link rel="stylesheet" href="<?=CSS.'inventarios.css'?>">
    <link rel="stylesheet" href="<?=CSS.'editar_usuario.css'?>">
    <link rel="stylesheet" href="<?=CSS.'registro.css'?>">
    <link rel="stylesheet" href="<?=CSS.'font_awesome/all.css'?>">
    <link rel="stylesheet" href="<?=CSS.'dt.css'?>">
    <script src="<?=JS."font_awesome/all.js"?>"></script>
    <script src="<?=JS."jquery.js"?>"></script>
    <script src="<?=JS."sweetAlert.js"?>></script>
    <script src="<?=JS."b5.js"?>"></script>
    <script src="<?=JS."dt.js"?>"></script>
    <title>SUITS</title>
</head>

<body>
    <?php require_once './views/components/navbar.php';?>
    <?php require_once './app/config/router.php';?>  
    <script src="./public/js/cerrar_sesion.js"></script>
    <script src="./public/js/main.js"></script>
    <script src="./public/js/editarUsuario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>