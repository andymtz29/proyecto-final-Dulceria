
<?php
    
    require_once '../config/conexion.php';
    session_start();

    class Login extends Conexion{
        private function crear_sesion($datos){
            $_SESSION['usuario'] = $datos;            
        }
        public function cerrar_sesion(){
            session_unset();
            session_destroy();
            echo json_encode([1,"Sesion finalizada!"]);
        }
        public function iniciar_sesion(){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];



            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_usuarios WHERE usuario = :usuario");
            $consulta->bindParam(":usuario",$usuario);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            if($datos){
                if(password_verify($password,$datos['password'])){
                    if ($rol === $datos['rol']) {
                   $this->crear_sesion($datos);
                    echo json_encode([1,"Sesion iniciada!"]);
                } else {
                    echo json_encode([0, "Rol incorrecto!"]);
                }

                }else{
                    echo json_encode([0,"Error en credenciales de acceso!"]);
                }
            }else{
                echo json_encode([0,"Error al buscar informacion!"]);
            }
        }
    }

    $consulta = new Login();
    $metodo = $_POST['metodo'];
    $consulta->$metodo();
?>

