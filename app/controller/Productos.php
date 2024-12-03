<?php 
require_once '../config/conexion.php';

class Productos extends Conexion {

    public function obtener_datos() {
        $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_productos");
        $consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrar_conexion();
        echo json_encode($datos);
    }

    public function insertar_datos() {
        if ($_POST) {
            if (
                isset($_POST['descripcion']) && !empty($_POST['descripcion']) && 
                isset($_POST['precio']) && !empty($_POST['precio']) && 
                isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
                isset($_POST['imagen_url']) && !empty($_POST['imagen_url']) // Se usa URL de imagen
            ) {
                // Validación adicional
                if (is_numeric($_POST['descripcion']) || !is_numeric($_POST['precio']) || !is_numeric($_POST['cantidad'])) {
                    echo json_encode([0, "No puedes agregar números en el campo de producto ni letras en precio o unidades"]);
                } else {  
                    $descripcion = $_POST['descripcion'];	
                    $precio = $_POST['precio'];	
                    $cantidad = $_POST['cantidad'];
                    $imagen_url = $_POST['imagen_url']; // Usamos la URL de la imagen

                    $insercion = $this->obtener_conexion()->prepare(
                        "INSERT INTO t_productos(descripcion, precio, cantidad, imagen) VALUES(:descripcion, :precio, :cantidad, :imagen)"
                    );
                    $insercion->bindParam(':descripcion', $descripcion);
                    $insercion->bindParam(':precio', $precio);
                    $insercion->bindParam(':cantidad', $cantidad);
                    $insercion->bindParam(':imagen', $imagen_url);

                    if ($insercion->execute()) {
                        echo json_encode([1, "Inserción correcta"]);
                    } else {
                        echo json_encode([0, "Inserción no realizada"]);
                    }
                }
            } else {
                echo json_encode([0, "No puedes dejar campos vacíos o la URL de la imagen no es válida"]);
            }
        }
    }

    public function actualizar_datos() {
        if ($_POST) {
            if (
                isset($_POST['descripcion']) && !empty($_POST['descripcion']) && 
                isset($_POST['precio']) && !empty($_POST['precio']) && 
                isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
                isset($_POST['id_producto']) && !empty($_POST['id_producto'])
            ) {
                // Validación adicional
                if (is_numeric($_POST['descripcion']) || !is_numeric($_POST['precio']) || !is_numeric($_POST['cantidad'])) {
                    echo json_encode([0, "No puedes agregar números en el campo de producto ni letras en precio o unidades"]);
                } else {
                    $descripcion = $_POST['descripcion'];	
                    $precio = $_POST['precio'];	
                    $cantidad = $_POST['cantidad'];
                    $id_producto = $_POST['id_producto'];

                    // Usamos la URL de la imagen (opcional)
                    if (isset($_POST['imagen_url']) && !empty($_POST['imagen_url'])) {
                        $imagen_url = $_POST['imagen_url'];
                        $actualizacion = $this->obtener_conexion()->prepare(
                            "UPDATE t_productos SET descripcion = :descripcion, precio = :precio, cantidad = :cantidad, imagen = :imagen WHERE id_producto = :id_producto"
                        );
                        $actualizacion->bindParam(':imagen', $imagen_url);
                    } else {
                        $actualizacion = $this->obtener_conexion()->prepare(
                            "UPDATE t_productos SET descripcion = :descripcion, precio = :precio, cantidad = :cantidad WHERE id_producto = :id_producto"
                        );
                    }

                    $actualizacion->bindParam(':descripcion', $descripcion);
                    $actualizacion->bindParam(':precio', $precio);
                    $actualizacion->bindParam(':cantidad', $cantidad);
                    $actualizacion->bindParam(':id_producto', $id_producto);

                    if ($actualizacion->execute()) {
                        echo json_encode([1, "Actualización correcta", $id_producto]);
                    } else {
                        echo json_encode([0, "Actualización no realizada"]);
                    }
                }
            } else {
                echo json_encode([0, "No puedes dejar campos vacíos"]);
            }
        }
    }

    public function eliminar_datos() {
        if (isset($_POST['id_producto']) && !empty($_POST['id_producto'])) {
            $id_producto = $_POST['id_producto'];

            $eliminar = $this->obtener_conexion()->prepare("DELETE FROM t_productos WHERE id_producto = :id_producto");
            $eliminar->bindParam(':id_producto', $id_producto);

            if ($eliminar->execute()) {
                echo json_encode([1, "Producto eliminado"]);
            } else {
                echo json_encode([0, "Error al eliminar el producto"]);
            }
        }
    }

    public function precargar_datos() {
        if (isset($_POST['id_producto']) && !empty($_POST['id_producto'])) {
            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_productos WHERE id_producto = :id_producto");
            $id_producto = $_POST['id_producto'];
            $consulta->bindParam("id_producto", $id_producto);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            echo json_encode($datos);
        }
    }
}

// Ejecuta el método solicitado desde el front-end
$consulta = new Productos();
$metodo = $_POST['metodo'];
$consulta->$metodo(); 