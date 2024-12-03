<?php
require_once '../config/conexion.php';

header('Content-Type: application/json'); 

class EditarUsuario extends Conexion
{
    public function actualizarDatos()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Capturar datos desde el formulario
            $nombre = $_POST['nombre'] ?? null;
            $apellido = $_POST['apellido'] ?? null;
            $usuario = $_POST['usuario'] ?? null;
            $password = $_POST['password'] ?? null;
            $id_usuario = $_POST['id_usuario'] ?? null;

            // Validar que los campos nombre y apellido no contengan números
            if (preg_match('/\d/', $nombre) || preg_match('/\d/', $apellido)) {
                echo json_encode([0, "El nombre y el apellido no pueden contener números"]);
                return;
            }

            // Validar que el correo electrónico contenga el símbolo "@"
            if (strpos($usuario, '@') === false) {
                echo json_encode([0, "El correo electrónico debe contener '@'"]);
                return;
            }

            // Verificar que no falten campos
            if (!$nombre || !$apellido || !$usuario || !$password || !$id_usuario) {
                echo json_encode([0, "Todos los campos son obligatorios"]);
                return;
            }

            // Actualizar datos en la base de datos
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE t_usuario 
                    SET nombre = :nombre, apellido = :apellido, usuario = :usuario, password = :password 
                    WHERE id_usuario = :id_usuario";
            $stmt = $this->obtener_conexion()->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':password', $password_hashed);
            $stmt->bindParam(':id_usuario', $id_usuario);

            if ($stmt->execute()) {
                echo json_encode([1, "Usuario actualizado correctamente"]);
            } else {
                echo json_encode([0, "Error al actualizar el usuario"]);
            }
        } else {
            echo json_encode([0, "Método no permitido"]);
        }
    }
}

// Instanciar la clase y ejecutar
$editarUsuario = new EditarUsuario();
$editarUsuario->actualizarDatos();
