<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://png.pngtree.com/png-clipart/20201208/original/pngtree-colorful-candy-feast-at-the-candy-store-png-image_5503562.jpg" 
                alt="Logo" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 50%; border: 1px solid #fff;">
            <span style="font-weight: bold; font-size: 1rem;">Candy</span>
        </a>

        <!-- Botón de toggler para dispositivos pequeños -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: #fff;"></span>
        </button>

        <!-- Navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Bienvenida al usuario -->
                <?php if (isset($_SESSION['usuario'])) : ?>
                    <li class="nav-item">
                        <span class="navbar-text me-3" style="font-size: 1rem; color: #007bff;">
                            Bienvenido, <strong><?= $_SESSION['usuario']['nombre']; ?></strong>
                        </span>
                    </li>
                    <!-- Botón para Administrador -->
                    <?php if ($_SESSION['usuario']['rol'] === 'Administrador') : ?>
                        <li class="nav-item me-2">
                            <a href="registro" class="btn btn-primary btn-sm">
                                <i class="fas fa-user-plus"></i> Registrar usuario
                            </a>
                        </li>
                    <?php endif ?>
                    <!-- Otros botones -->
                    <li class="nav-item me-2">
                        <a href="inicio" class="btn btn-info btn-sm">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="editar_usuario" class="btn btn-warning btn-sm" id="btn_editar">
                            <i class="fas fa-user-edit"></i> Editar Usuario
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="inventario" class="btn btn-success btn-sm" id="btn_inventario">
                            <i class="fas fa-boxes"></i> Inventario
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <button type="button" class="btn btn-danger btn-sm" id="btn_cerrar">
                            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                        </button>
                    </li>

                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
