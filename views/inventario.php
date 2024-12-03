<?php 
if (!isset($_SESSION['usuario'])) {
    header("location:login");
    exit();
}
?>
<input type="hidden" id="adm" value="<?= ($_SESSION['usuario']['rol'] === 'Administrador') ? 'Administrador' :'Usuario'?>">
<div class="container mt-5">
        <div class="row justify-content-center p-4 rounded shadow-lg" style="background-color: rgba(255, 255, 255, 0.5);">
            <div class="col-12 text-center mt-4 mb-4">
                <h2>Lista de Productos</h2>
            </div>
            <div class="col-12 text-end mb-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarModal">
                    <i class="fa fa-plus-circle"></i> Añadir Producto
                </button>
            </div>
            <div class="col-12">
                <!-- Contenedor para las Cards de Productos -->
                <div class="row row-cols-1 row-cols-md-3 g-4" id="cards_container">
                    <!-- Las cards de los productos se agregarán aquí desde JS -->
                </div>
            </div>
            <div class="col-12 text-center mt-3">
                <hr class="text-primary">
                <p class="lead">Andrea</p>
            </div>
        </div>
    </div>

    <!-- Modal para Agregar Producto -->
    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="agregarModalLabel"><i class="fas fa-plus-circle"></i> Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_agregar">
                        <div class="mb-3">
                            <label for="imagen_url" class="form-label">Imagen (URL)</label>
                            <input type="text" class="form-control" id="imagen_url" name="imagen_url" placeholder="Ingrese la URL de la imagen" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese el nombre del producto" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Unidades</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
                    <button type="button" class="btn btn-success" id="btn_agregar"><i class="fas fa-plus"></i> Añadir Producto</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Producto -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="agregarModalLabel" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editarModalLabel"><i class="fas fa-edit"></i> Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_editar">
                        <input type="hidden" id="id_producto_act">
                        <div class="mb-3">
                            <label for="edit_descripcion" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="edit_descripcion" name="edit_descripcion" placeholder="Ingrese el nombre del producto" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="edit_precio" name="edit_precio" placeholder="Ingrese el precio" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_cantidad" class="form-label">Unidades</label>
                            <input type="number" class="form-control" id="edit_cantidad" name="edit_cantidad" placeholder="Ingrese la cantidad" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_imagen_url" class="form-label">Imagen (URL)</label>
                            <input type="text" class="form-control" id="edit_imagen_url" name="edit_imagen_url" placeholder="Ingrese la URL de la imagen">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btn_actualizar"><i class="fas fa-save"></i> Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/main.js"></script>