<?php
if ($_SESSION['usuario']['rol'] === 'Usuario') {
    header("location:inicio");
    exit();
}
if (!isset($_SESSION['usuario'])) {
    header("location:login");
    exit();
}
?>
<form class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4 login-box shadow-lg rounded p-4">
            <h3 class="text-center mb-4 text-light fw-bold">Registro</h3>
            <img src="<?=IMG."registro.png"?>" class="mx-auto d-block rounded-circle mb-4 border border-light" width="60%" alt="Registro">

            <!-- Nombre -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                <label for="nombre"><i class="fa-regular fa-user me-2"></i>Nombre</label>
            </div>

            <!-- Apellido -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                <label for="apellido"><i class="fa-solid fa-user-tag me-2"></i>Apellido</label>
            </div>

            <!-- Usuario (Email) -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                <label for="usuario"><i class="fa-regular fa-envelope me-2"></i>Correo Electrónico</label>
            </div>

            <!-- Password -->
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                <label for="password"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
            </div>

            <!-- Rol -->
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="rol" name="rol" placeholder="Rol">
                <label for="rol"><i class="fa-solid fa-user-shield me-2"></i>Rol (Administrador o Usuario)</label>
            </div>

            <!-- Botón de Registro -->
            <button type="button" class="btn btn-gradient w-100 mb-3 fw-bold" id="btn_registro">
                <i class="fa-solid fa-user-plus me-2"></i>Registrar
            </button>
        </div>
    </div>
</form>


<script src="./public/js/registro.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
