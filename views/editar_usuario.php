<?php
if (!isset($_SESSION['usuario'])) {
    header("Location: inicio");
    exit();
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 animated-card">
                <div class="card-header text-center bg-gradient text-dark">
                    <h2 class="mb-0">Editar Usuario</h2>
                    <i class="fas fa-user-edit fa-3x mt-2"></i>
                </div>
                <div class="card-body bg-light">
                    <form id="editarUsuarioForm">
                        <input type="hidden" id="id_usuario" value="<?= $_SESSION['usuario']['id_usuario'] ?>">
                        
                        <div class="form-group mb-3">
                            <label for="newNombre"><i class="fas fa-user me-2"></i> Nuevo Nombre:</label>
                            <input type="text" class="form-control" id="newNombre" value="<?= $_SESSION['usuario']['nombre'] ?>" placeholder="Ingrese su nuevo nombre" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="newApellido"><i class="fas fa-user-tag me-2"></i> Nuevo Apellido:</label>
                            <input type="text" class="form-control" id="newApellido" value="<?= $_SESSION['usuario']['apellido'] ?>" placeholder="Ingrese su nuevo apellido" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="newUsuario"><i class="fas fa-envelope me-2"></i> Nuevo Correo:</label>
                            <input type="email" class="form-control" id="newUsuario" value="<?= $_SESSION['usuario']['usuario'] ?>" placeholder="Ingrese su nuevo correo" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="newPassword"><i class="fas fa-lock me-2"></i> Nueva Contraseña:</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Ingrese una nueva contraseña" required>
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-success btn-lg w-100 btn-glow" id="actualizarDatos">
                                <i class="fas fa-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-center bg-gradient-footer">
                    <a href="inicio" class="btn btn-secondary btn-lg">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
